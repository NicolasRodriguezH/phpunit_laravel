<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /* Usar predefinidamente una de las dos formas de definir los Tests */
    public function testUpload() {
        Storage::fake('local');

        $response = $this->post('profile', [
            // Se modifico el metodo create, antes era image y no funcionaba, supongo que por las version
            'photo' => $photo = UploadedFile::fake()->create('photo.png')
        ]);


        //Storage::disk('local')->assertExists("profiles/{$photo->hashName()}");
        $this->assertTrue(Storage::disk('local')->exists("profiles/{$photo->hashName()}"));

        $response->assertRedirect('profile');
    }

    public function test_photo_required() {
        $response = $this->post('profile', ['photo' => '']);

        $response->assertSessionHasErrors('photo');
    }
}
