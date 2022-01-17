<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test user can login.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test user cannot login with wrong password.
     *
     * @return void
     */
    public function testUserCannotLoginWithWrongPassword()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => $this->faker->text
        ]);

        $response->assertStatus(422);
    }

    /**
     * Test user cannot login without existing account.
     *
     * @return void
     */
    public function testUserCannotLoginWithoutExistingAccount()
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->text
        ]);

        $response->assertStatus(422);
    }
}
