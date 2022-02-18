<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test get user.
     *
     * @return void
     */
    public function testGetUser()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $response = $this->getJson('/api/user');

        $response->assertStatus(200);
    }

    /**
     * Test can not get user if not authenticated.
     *
     * @return void
     */
    public function testCanNotGetUserIfNotAuthenticated()
    {
        $response = $this->get('/api/user');

        $response->assertStatus(401);
    }

    /**
     * Test update user.
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $response = $this->patchJson('/api/user', [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $user->email,
            'location' => $this->faker->city,
            'bio' => $this->faker->text,
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test can not update user if not authenticated.
     *
     * @return void
     */
    public function testCanNotUpdateUserIfNotAuthenticated()
    {
        $response = $this->patchJson('/api/user', [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'location' => $this->faker->city,
            'bio' => $this->faker->text,
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test all update user validation rules fail.
     *
     * @return void
     */
    public function testAllUpdateUserValidationRulesFail()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $response = $this->patchJson('/api/user', [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'location' => '',
            'bio' => '',
        ]);

        $response->assertStatus(422);
    }
}
