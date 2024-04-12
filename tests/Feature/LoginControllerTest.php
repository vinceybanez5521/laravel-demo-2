<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login(): void {
        $response = $this->post(
            '/login',
            [
                'email' => 'vinceybanez5521@gmail.com',
                'password' => '12345678',
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_register(): void {
        $name = fake()->name();
        $email = fake()->unique()->safeEmail();
        $password = '12345678';

        $response = $this->post(
            '/register',
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }
}
