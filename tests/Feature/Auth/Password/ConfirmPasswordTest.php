<?php

namespace Tests\Feature\Auth\Password;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ConfirmPasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanConfirmPassword()
    {
        Passport::actingAs(User::factory()->create());

        $response = $this->postJson('/api/auth/password/confirm', [
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCannotConfirmWrongPassword()
    {
        Passport::actingAs(User::factory()->create());

        $response = $this->postJson('/api/auth/password/confirm', [
            'password' => $this->faker->text
        ]);

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCannotConfirmPasswordIfNotAuthenticated()
    {
        $response = $this->postJson('/api/auth/password/confirm');

        $response->assertStatus(401);
    }
}
