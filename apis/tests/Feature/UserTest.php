<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testNewUserHasProfileInfo()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $user->profile()->save($profile);
        $user->refresh();

        $response = $this->json('GET', '/api/profile/'.$user->id);

        // $res_data = $response->original['data'];
        // dd($res_data);
        // dd($user->profile);

        $response->assertStatus(200)
        ->assertJson([
            'data' => [
                'first_name' => $user->profile->first_name,
                'last_name' => $user->profile->last_name,
                'email' => $user->profile->email,
                'phone' => $user->profile->phone,
                'gender' => $user->profile->gender,
                'image_url' => $user->profile->image_url,
            ]
        ]);
    }

    public function testUserCanUpdateProfileInformation()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $user->profile()->save($profile);
        // dd($user->profile);
        $user->refresh();

        $update_data = [
            'user_id'    => $user->id,
            'first_name' => 'Jegede',
            'last_name'  => 'Smith',
            'phone'      => '08030892639',
            'gender'     => 'Male'
        ];

        $response = $this->json('PUT', '/api/profile/', $update_data);

        // $res_data = $response->original['data'];
        // dd($res_data);
        // dd($user->profile);

        $response->assertStatus(200)
        ->assertJson([
            'data' => [
                'first_name' => $update_data['first_name'],
                'last_name' => $update_data['last_name'],
                'phone' => $update_data['phone'],
                'gender' => $update_data['gender'],
            ]
        ]);
    }

    public function testUserCanUploadProfileImage()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->create([
            'user_id' => $user->id
        ]);

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->json('PUT', '/api/profile_image', [
            'user_id' => $user->id,
            'photo' => $file,
        ]);

        // Assert the file was stored...
        Storage::disk('profile_photos')->assertExists('/'.$user->id.'/'.$file->hashName());

        // Assert a file does not exist...
        Storage::disk('profile_photos')->assertMissing('/'.$user->id.'/'.'missing.jpg');
        // Assert the User profile has the correct image link
        $this->assertEquals('profile_photos/'.$user->id.'/'.$file->hashName(), $user->profile->image_url);
    }
}
