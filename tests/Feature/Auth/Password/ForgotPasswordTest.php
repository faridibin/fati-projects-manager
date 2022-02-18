<?php

namespace Tests\Feature\Auth\Password;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test user can request reset link.
     *
     * @return void
     */
    public function testUserCanRequestResetLink()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/password/email', [
            'email' => $user->email
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test user cannot request reset link if account does not exist.
     *
     * @return void
     */
    public function testUserCannotRequestResetLinkIfAccountDoesNotExist()
    {
        $response = $this->postJson('/api/auth/password/email', [
            'email' => $this->faker->unique()->safeEmail,
        ]);

        $response->assertStatus(422);
    }

    /**
     * Test all validation rules fail.
     *
     * @return void
     */
    public function testAllValidationRulesFail()
    {
        $response = $this->postJson('/api/auth/password/email');

        $response->assertStatus(422);
    }
}
