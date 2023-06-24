<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredUser;

class MailsTest extends TestCase
{   
    use RefreshDatabase;

    public function testSignUpMailIsSentAfterNewUserRegistration()
    {
        $this->withoutExceptionHandling();
        
        Mail::fake();
        
        // Assert that no mailables were sent...
        Mail::assertNothingSent();
        
        // Create new user...
        $user_data = [
            'name' => 'Mr Martins' ,
            'email' => 'test-6zrnnn712@srv1.mail-tester.com',
            'password' => 'mastermind' ,
            'password_confirmation' => 'mastermind',
        ];

        $response = $this->json('POST', 'api/register', $user_data);
        $user = (object) $response->original['data'];
        // dd($user);

        // Assert a specific type of mailable was 
        // dispatched meeting the given truth test...
        Mail::assertSent(function (RegisteredUser $mail) use ($user) {
            // dd($mail);
            return $mail->user->id === $user->id;
        });

        // Assert a message was sent to the given users...
        Mail::assertSent(RegisteredUser::class, function ($mail) use ($user) {
            // dd($mail);
            return $mail->hasTo($user->email);
        });

        // Assert a mailable was sent once...
        Mail::assertSent(RegisteredUser::class, 1);

        // Assert a mailable was not sent...
        Mail::assertNotSent(AnotherMailable::class);
    }
}
