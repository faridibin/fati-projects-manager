<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test user can register.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $response = $this->postJson('/api/auth/register', [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '@password12345'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test user cannot register if account exists.
     *
     * @return void
     */
    public function testUserCannotRegisterIfAccountExists()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/register', [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => '@password12345'
        ]);

        $response->assertStatus(422);
    }

    /**
     * Test user cannot register if password does not comply.
     *
     * @return void
     */
    public function testUserCannotRegisterIfPasswordDoesNotComply()
    {
        $response = $this->postJson('/api/auth/register', [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password'
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
        $response = $this->postJson('/api/auth/register');

        $response->assertStatus(422);
    }
}
