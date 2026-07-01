<?php

namespace Tests\Feature;

use App\Models\Permohonan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SatisfactionSurveyTest extends TestCase
{
    use RefreshDatabase;

    protected $resolvedPermohonan;
    protected $pendingPermohonan;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resolvedPermohonan = Permohonan::create([
            'ticket_number' => '#UNBRAH-PER-11111',
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@gmail.com',
            'nik' => '1234567890123456',
            'telepon' => '081234567890',
            'alamat' => 'Jl. Khatib Sulaiman No. 10',
            'kategori' => 'permohonan',
            'subjek' => 'Data Dosen FK',
            'perincian' => 'Meminta data dosen aktif Fakultas Kedokteran.',
            'status' => 'Selesai',
            'tanggapan' => 'Data terlampir.'
        ]);

        $this->pendingPermohonan = Permohonan::create([
            'ticket_number' => '#UNBRAH-PER-22222',
            'nama' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'nik' => '1234567890123457',
            'telepon' => '081234567891',
            'alamat' => 'Jl. Khatib Sulaiman No. 11',
            'kategori' => 'permohonan',
            'subjek' => 'Data Dosen FKG',
            'perincian' => 'Meminta data dosen aktif Fakultas Kedokteran Gigi.',
            'status' => 'Pending'
        ]);
    }

    public function test_can_view_evaluation_page_for_resolved_ticket()
    {
        // Strip # symbol to match URL routing parameter
        $ticketId = str_replace('#', '', $this->resolvedPermohonan->ticket_number);
        
        $response = $this->get("/evaluasi/{$ticketId}");
        
        $response->assertStatus(200)
                 ->assertSee('Evaluasi Kepuasan')
                 ->assertSee($this->resolvedPermohonan->subjek);
    }

    public function test_cannot_view_evaluation_page_for_unresolved_ticket()
    {
        $ticketId = str_replace('#', '', $this->pendingPermohonan->ticket_number);

        $response = $this->get("/evaluasi/{$ticketId}");

        // Should render fallback page with 403 status (not a redirect)
        $response->assertStatus(403)
                 ->assertSee('Evaluasi Belum Dapat Diisi');
    }

    public function test_cannot_view_evaluation_page_for_invalid_ticket()
    {
        $response = $this->get('/evaluasi/UNBRAH-PER-00000');

        // Unknown ticket number should render fallback with 404
        $response->assertStatus(404)
                 ->assertSee('Nomor Tiket Tidak Valid');
    }

    public function test_shows_already_rated_fallback_page_on_revisit()
    {
        // Pre-fill the rating so it's already been submitted
        $this->resolvedPermohonan->update(['rating' => 4, 'ulasan_kepuasan' => 'Pelayanan baik']);

        $ticketId = str_replace('#', '', $this->resolvedPermohonan->ticket_number);
        $response = $this->get("/evaluasi/{$ticketId}");

        // Should render the 'already_rated' fallback, HTTP 200 (not an error)
        $response->assertStatus(200)
                 ->assertSee('Evaluasi Sudah Pernah Dikirimkan')
                 ->assertSee('4/5');
    }

    public function test_can_submit_satisfaction_survey()
    {
        $ticketId = str_replace('#', '', $this->resolvedPermohonan->ticket_number);

        $response = $this->postJson("/evaluasi/{$ticketId}", [
            'rating' => 5,
            'ulasan_kepuasan' => 'Pelayanan sangat cepat dan data lengkap!'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['success' => true]);

        $fresh = $this->resolvedPermohonan->fresh();
        $this->assertEquals(5, $fresh->rating);
        $this->assertEquals('Pelayanan sangat cepat dan data lengkap!', $fresh->ulasan_kepuasan);
    }

    public function test_rating_must_be_between_1_and_5()
    {
        $ticketId = str_replace('#', '', $this->resolvedPermohonan->ticket_number);

        // Under scale (0)
        $response = $this->postJson("/evaluasi/{$ticketId}", [
            'rating' => 0
        ]);
        $response->assertStatus(422);

        // Over scale (6)
        $response2 = $this->postJson("/evaluasi/{$ticketId}", [
            'rating' => 6
        ]);
        $response2->assertStatus(422);
    }

    public function test_cannot_submit_rating_multiple_times()
    {
        $ticketId = str_replace('#', '', $this->resolvedPermohonan->ticket_number);

        // First submit (success)
        $response = $this->postJson("/evaluasi/{$ticketId}", [
            'rating' => 4
        ]);
        $response->assertStatus(200);

        // Second submit (should fail)
        $response2 = $this->postJson("/evaluasi/{$ticketId}", [
            'rating' => 5
        ]);
        $response2->assertStatus(422);
    }
}
