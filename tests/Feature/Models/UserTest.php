<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // migrate

    public function testUser()
    {
        //$response = $this->get('/');
        // Proccess CRUD

        User::factory()->create([
            'email' => 'i@admin.com'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'i@admin.com',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'no@existe.com',
        ]);
    }
}
