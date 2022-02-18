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
     * Test user can confirm password.
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
     * Test user cannot confirm wrong password.
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
     * Test user cannot confirm password if not authenticated.
     *
     * @return void
     */
    public function testUserCannotConfirmPasswordIfNotAuthenticated()
    {
        $response = $this->postJson('/api/auth/password/confirm');

        $response->assertStatus(401);
    }

    /**
     * Test all validation rules fail.
     *
     * @return void
     */
    public function testAllValidationRulesFail()
    {
        Passport::actingAs(User::factory()->create());

        $response = $this->postJson('/api/auth/password/confirm');

        $response->assertStatus(422);
    }
}
