<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
   public function test_user_cannot_create_student()
    {
        $response = $this->post('/register', [
            'name' => 'Maryanto',
            'email' => 'maryanto@gmail.com',
            'password' => '12345678',
            'password_confimation' => '12345678',
            'role' => 'member'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'maryanto@gmail.com'
        ]);

        $user = User::where('email', 'maryanto@gmail.com')->first();
        
        $this->actingAs($user);

        $response2= $this->get('/create');
        $response2->assertStatus(403);
    }

    public function test_admin_can_create_student()
    {
        $response = $this->post('/register', [
            'name' => 'Admin',
            'email' => 'adnan@idn.com',
            'password' => '12345678',
            'password_confimation' => '12345678',
            'role' => 'admin'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'adnan@idn.com'
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'adnan1@idn.com'
        ]);

        $user = User::where('email', 'adnan@idn.com')->first();
        
        $this->actingAs($user);

        $response2= $this->get('/create');
        $response2->assertStatus(200);
    }
}
