<?php

namespace Tests\Feature\Auth\Password;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test user can reset password.
     *
     * @return void
     */
    public function testUserCanResetPassword()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/password/reset', [
            'token' => Password::broker()->createToken($user),
            'email' => $user->email,
            'password' => '@password12345',
            'password_confirmation' => '@password12345'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test user cannot reset password if email does not match.
     *
     * @return void
     */
    public function testUserCannotResetPasswordIfEmailDoesNotMatch()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/password/reset', [
            'token' => Password::broker()->createToken($user),
            'email' => $this->faker->unique()->safeEmail,
            'password' => '@password12345',
            'password_confirmation' => '@password12345'
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test user cannot reset password if token is invalid.
     *
     * @return void
     */
    public function testUserCannotResetPasswordIfTokenIsInvalid()
    {
        $response = $this->postJson('/api/auth/password/reset', [
            'token' => $this->faker->sha256(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => '@password12345',
            'password_confirmation' => '@password12345'
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test user can reset password if password does not comply.
     *
     * @return void
     */
    public function testUserCannotResetPasswordIfPasswordDoesNotComply()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/password/reset', [
            'token' => Password::broker()->createToken($user),
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test all validation rules fail.
     *
     * @return void
     */
    public function testAllValidationRulesFail()
    {
        $response = $this->postJson('/api/auth/password/reset');

        $response->assertStatus(422);
    }
}
