<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public $payload = null;
    public $invalid_payload = null;

    public function setUp(): void 
    {
        parent::setUp();
        $this->payload = [
            'name' => 'John',
            'email' => 'john@toptal.com',
            'password' => 'toptal123',
            'password_confirmation' => 'toptal123',
        ];
        $this->incomplete_payload = [
            'name' => 'John',
            'email' => 'john@toptal.com',
            'password' => 'toptal123',
        ];
    }

    public function testsRegistersSuccessfully()
    {
        $this->json('post', '/api/register', $this->payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'id',
                    'api_token',
                ],
            ]);;
    }

    public function testsRequiresPasswordEmailAndName()
    {
        $this->json('post', '/api/register')
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "password"=>["The password field is required."],
                    "email"=>["The email field is required."]
                ],
                "message" => "The given data was invalid.",
            ]);
    }

    public function testsRequirePasswordConfirmation()
    {
        $this->json('post', '/api/register', $this->incomplete_payload)
            ->assertStatus(422)
            ->assertJson([
                "errors" => ["password"=>["The password confirmation does not match."]],
                "message" => "The given data was invalid.",
            ]);
    }
}
