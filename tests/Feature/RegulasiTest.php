<?php

namespace Tests\Feature;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RegulasiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test uploading a PDF file via AJAX.
     */
    public function test_can_upload_pdf_file(): void
    {
        // Fake public disk / uploads directory
        Storage::fake('public');

        $file = UploadedFile::fake()->create('test_document.pdf', 500, 'application/pdf');

        $response = $this->postJson(route('admin.upload-file'), [
            'file' => $file,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['success', 'path']);

        $path = $response->json('path');
        $this->assertStringContainsString('/uploads/', $path);
    }

    /**
     * Test uploading non-pdf file fails validation.
     */
    public function test_cannot_upload_non_pdf_file(): void
    {
        $file = UploadedFile::fake()->create('image.png', 100, 'image/png');

        $response = $this->postJson(route('admin.upload-file'), [
            'file' => $file,
        ]);

        // Validation error
        $response->assertStatus(422);
    }

    /**
     * Test saving regulation settings array dynamically.
     */
    public function test_can_save_regulation_settings(): void
    {
        $regulasiData = [
            [
                'type' => 'Keputusan Rektor',
                'title' => 'SK Rektor 2026/06',
                'desc' => 'Uji coba upload PDF regulasi melalui fitur admin baru.',
                'link' => 'https://unbrah.ac.id',
                'file' => '/uploads/test_upload.pdf'
            ]
        ];

        $response = $this->post(route('admin.tentang.update'), [
            'regulasi_list' => $regulasiData,
        ]);

        $response->assertRedirect();
        
        // Assert stored value
        $storedValue = Setting::getValue('regulasi_list');
        $this->assertNotNull($storedValue);
        
        $decoded = json_decode($storedValue, true);
        $this->assertEquals('Keputusan Rektor', $decoded[0]['type']);
        $this->assertEquals('SK Rektor 2026/06', $decoded[0]['title']);
    }

    /**
     * Test rendering public regulation page with dynamic data.
     */
    public function test_can_render_dynamic_regulations_on_public_page(): void
    {
        $regulasiData = [
            [
                'type' => 'Undang-Undang Khusus',
                'title' => 'UU KIP Versi Test',
                'desc' => 'Deskripsi testing dinamis.',
                'link' => 'https://wikipedia.org/test',
                'file' => '/uploads/test.pdf'
            ]
        ];

        Setting::setValue('regulasi_list', json_encode($regulasiData));

        $response = $this->get('/regulasi');

        $response->assertStatus(200);
        $response->assertSee('Undang-Undang Khusus');
        $response->assertSee('UU KIP Versi Test');
        $response->assertSee('Deskripsi testing dinamis.');
    }
}
