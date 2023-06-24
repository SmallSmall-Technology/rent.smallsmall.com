<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class VerifiedUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserIsVerified()
    {
        $user = factory(User::class)->state('verified')->create();

        $response = $this->json('GET', 'api/verified-user/'.$user->id, ['user_id' => $user->id]);

        $response->assertStatus(200)
        ->assertJsonStructure(["data" => ["email_verified_at"]]);
    }
    public function testNewUserIsNotVerified()
    {
        $user = factory(User::class)->create();

        $response = $this->json('GET', 'api/verified-user/'.$user->id, ['user_id' => $user->id]);

        // dd($user);

        $response->assertStatus(404)
        ->assertJson(["data" => null]);
    }
}
