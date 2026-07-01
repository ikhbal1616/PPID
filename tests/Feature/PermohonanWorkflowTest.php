<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Mail\PermohonanStatusMail;
use Tests\TestCase;

class PermohonanWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;
    protected $permohonan;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin user
        $this->adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@ppid.test',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Create a mock permohonan
        $this->permohonan = Permohonan::create([
            'ticket_number' => '#UNBRAH-PER-12345',
            'nama' => 'Ahmad Fauzi',
            'nik' => '1371012345678901',
            'email' => 'ahmad@gmail.com',
            'telepon' => '081234567890',
            'alamat' => 'Jl. Bypass KM 15, Padang',
            'kategori' => 'permohonan',
            'subjek' => 'Permintaan Brosur Unbrah',
            'perincian' => 'Meminta berkas brosur terbaru Unbrah.',
            'status' => 'Pending'
        ]);
    }

    public function test_public_can_search_ticket_and_receives_masked_pii()
    {
        // 1. Search with hashtag prefix
        $response = $this->getJson('/cek-tiket?id=%23UNBRAH-PER-12345');
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => [
                         'id' => '#UNBRAH-PER-12345',
                         'nama' => 'A*********i',
                         'email' => 'ah***@gm***.com',
                         'nik' => '1371********8901',
                         'telepon' => '0812******90'
                     ]
                 ]);

        // 2. Search without hashtag prefix (normalized)
        $response2 = $this->getJson('/cek-tiket?id=UNBRAH-PER-12345');
        $response2->assertStatus(200)
                  ->assertJsonFragment(['nama' => 'A*********i']);

        // 3. Search for non-existent ticket
        $response3 = $this->getJson('/cek-tiket?id=UNBRAH-PER-99999');
        $response3->assertStatus(404)
                  ->assertJson(['success' => false]);
    }

    public function test_cannot_transition_from_pending_directly_to_resolved_or_rejected()
    {
        Mail::fake();

        // Must act as admin
        $this->actingAs($this->adminUser);

        // Try direct jump to Selesai (should fail)
        $response = $this->postJson(route('admin.permohonan.update', $this->permohonan->id), [
            'status' => 'Selesai',
            'tanggapan' => 'Sudah selesai'
        ]);

        $response->assertStatus(422)
                 ->assertJsonFragment(['success' => false]);

        // Verify status remains Pending
        $this->assertEquals('Pending', $this->permohonan->fresh()->status);
        Mail::assertNothingSent();
    }

    public function test_can_transition_from_pending_to_ditinjau_and_sends_email()
    {
        Mail::fake();
        $this->actingAs($this->adminUser);

        // Transition from Pending to Ditinjau
        $response = $this->postJson(route('admin.permohonan.update', $this->permohonan->id), [
            'status' => 'Ditinjau'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['success' => true]);

        $this->assertEquals('Ditinjau', $this->permohonan->fresh()->status);
        
        // Assert email sent
        Mail::assertSent(PermohonanStatusMail::class, function ($mail) {
            return $mail->hasTo('ahmad@gmail.com') && $mail->permohonan->status === 'Ditinjau';
        });
    }

    public function test_cannot_resolve_or_reject_from_ditinjau_without_tanggapan()
    {
        $this->actingAs($this->adminUser);

        // Set state to Ditinjau first
        $this->permohonan->update(['status' => 'Ditinjau']);

        // Try to update to Selesai without tanggapan (should fail)
        $response = $this->postJson(route('admin.permohonan.update', $this->permohonan->id), [
            'status' => 'Selesai',
            'tanggapan' => ''
        ]);

        $response->assertStatus(422);
        $this->assertEquals('Ditinjau', $this->permohonan->fresh()->status);
    }

    public function test_can_resolve_from_ditinjau_with_tanggapan_and_sends_email()
    {
        Mail::fake();
        $this->actingAs($this->adminUser);

        // Set state to Ditinjau first
        $this->permohonan->update(['status' => 'Ditinjau']);

        // Create a fake file
        $file = \Illuminate\Http\UploadedFile::fake()->create('dokumen_tanggapan.pdf', 100);

        // Transition to Selesai with file
        $response = $this->postJson(route('admin.permohonan.update', $this->permohonan->id), [
            'status' => 'Selesai',
            'tanggapan' => 'Informasi terlampir pada tautan resmi.',
            'file_tanggapan' => $file
        ]);

        $response->assertStatus(200);
        $freshPermohonan = $this->permohonan->fresh();
        $this->assertEquals('Selesai', $freshPermohonan->status);
        $this->assertEquals('Informasi terlampir pada tautan resmi.', $freshPermohonan->tanggapan);
        $this->assertNotNull($freshPermohonan->file_tanggapan);

        // Assert file exists in public/uploads
        $uploadedPath = public_path($freshPermohonan->file_tanggapan);
        $this->assertTrue(file_exists($uploadedPath));

        // Clean up uploaded file
        if (file_exists($uploadedPath)) {
            unlink($uploadedPath);
        }

        // Assert email sent
        Mail::assertSent(PermohonanStatusMail::class, function ($mail) {
            return $mail->hasTo('ahmad@gmail.com') && $mail->permohonan->status === 'Selesai';
        });
    }

    public function test_cannot_modify_status_once_it_is_final()
    {
        $this->actingAs($this->adminUser);

        // Set state to Selesai
        $this->permohonan->update(['status' => 'Selesai', 'tanggapan' => 'Selesai']);

        // Try to change status back to Ditinjau
        $response = $this->postJson(route('admin.permohonan.update', $this->permohonan->id), [
            'status' => 'Ditinjau'
        ]);

        $response->assertStatus(422);
        $this->assertEquals('Selesai', $this->permohonan->fresh()->status);
    }
}
