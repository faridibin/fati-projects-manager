<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test user can change password.
     *
     * @return void
     */
    public function testUserCanChangePassword()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $response = $this->postJson('/api/user/password', [
            'current_password' => 'password',
            'password' => '@password12345',
            'password_confirmation' => '@password12345'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test user cannot change password if not authenticated.
     *
     * @return void
     */
    public function testUserCannotChangePasswordIfNotAuthenticated()
    {
        $response = $this->postJson('/api/user/password', [
            'current_password' => 'password',
            'password' => '@password12345',
            'password_confirmation' => '@password12345'
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test user cannot change password if current password is invalid.
     *
     * @return void
     */
    public function testUserCannotChangePasswordIfCurrentPasswordIsInvalid()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $response = $this->postJson('/api/user/password', [
            'current_password' => $this->faker->password,
            'password' => '@password12345',
            'password_confirmation' => '@password12345'
        ]);

        $response->assertStatus(422);
    }

    /**
     * Test user cannot change password if password confirmation does not match.
     *
     * @return void
     */
    public function testUserCannotChangePasswordIfPasswordConfirmationDoesNotMatch()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $response = $this->postJson('/api/user/password', [
            'current_password' => $this->faker->password,
            'password' => '@password12345',
            'password_confirmation' => ''
        ]);

        $response->assertStatus(422);
    }
}
