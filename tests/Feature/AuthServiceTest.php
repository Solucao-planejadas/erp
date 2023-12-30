<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{

    public function testRegister()
    {
        $response = $this->postJson(route('register'), [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }

    public function testLogin()
    {
        $response = $this->postJson(route('login'), [
            'email' => 'john.doe@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }
}
