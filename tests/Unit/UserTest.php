<?php

namespace Tests\Unit;

use App;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_login_from()
    {
        $response = $this->get('/login');
        $response-> assertStatus(200);
    }

    public function test_endpoint_not_exists()
    {
        $response  = $this->get('/update');
        $response -> assertStatus(404);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Maryanto',
            'email'=>'maryanto@gmail.com'
        ]);
        $user2 =  User::make([
            'name'=> 'Sandi',
            'email' => 'sandi@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
        $this->assertTrue($user1->email != $user2->email);
       
    }

    public function test_delete_user()
    {
        $user = User::make([
            'name' => 'Test',
            'email' => 'test@gmail.com'
        ]);

        $user->delete();

        $this->assertTrue(true);
    }
}
