<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class VerificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can verify account.
     *
     * @return void
     */
    public function testUserCanVerifyAccount()
    {
        Passport::actingAs(User::factory()->create());

        $response = $this->postJson('/api/auth/verify');

        $response->assertStatus(200);
    }

    /**
     * Test user cannot verify account if not authenticated.
     *
     * @return void
     */
    public function testUserCannotVerifyAccountIfNotAuthenticated()
    {
        $response = $this->postJson('/api/auth/verify');

        $response->assertStatus(401);
    }
}
