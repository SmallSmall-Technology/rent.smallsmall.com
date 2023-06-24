<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User as User;

class VerifiedUserTest extends TestCase
{
    use RefreshDatabase;

    public function testCanVerifyUser()
    {
        $user = factory(User::class)->create();
        $user = $user->verify();
        $this->assertNotEmpty($user->email_verified_at);
    }

    public function testNewUserIsNotVerified()
    {
        $user = factory(User::class)->create();
        $this->assertEmpty($user->email_verified_at);
    }
}
