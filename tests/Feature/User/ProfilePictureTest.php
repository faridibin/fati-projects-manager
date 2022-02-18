<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProfilePictureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can update profile picture.
     *
     * @return void
     */
    public function testUserCanUpdateProfilePicture()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->postJson('/api/user/profile-picture', [
            'file' => $file
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test user cannot update profile picture if not authenticated.
     *
     * @return void
     */
    public function testUserCannotUpdateProfilePictureIfNotAuthenticated()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->postJson('/api/user/profile-picture', [
            'file' => $file
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test user can update profile picture.
     *
     * @return void
     */
    public function testUserCanOnlyUploadImage()
    {
        $user = User::factory()->create();

        Passport::actingAs($user);

        $file = UploadedFile::fake()->image('avatar.pdf');

        $response = $this->postJson('/api/user/profile-picture', [
            'file' => $file
        ]);

        $response->assertStatus(422);
    }
}
