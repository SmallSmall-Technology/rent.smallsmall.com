<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public $authenticated_bundle = null;

    public function setUp(): void 
    {
        parent::setUp();
        $this->auth_bundle = $this->getAuthBundle();

    }

    private function getAuthBundle()
    {
        $user  = factory(User::class)->create();
        $token = $user->generateToken();
        return (object)[
            "user" => $user,
            "token" => $token,
            "headers" => ['Authorization' => "Bearer $token"]
        ];
    }

    public function testsArticlesAreCreatedCorrectly()
    {

        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $this->json('POST', '/api/articles', $payload, $this->auth_bundle->headers)
            ->assertStatus(201)
            ->assertJson(['id' => 1, 'title' => 'Lorem', 'body' => 'Ipsum']);
    }

    public function testsArticlesAreUpdatedCorrectly()
    {
        $article = factory(Article::class)->create([
            'title' => 'First Article',
            'body' => 'First Body',
        ]);

        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/articles/' . $article->id, $payload, $this->auth_bundle->headers)
            ->assertStatus(200)
            ->assertJson([ 
                'id' => 1, 
                'title' => 'Lorem', 
                'body' => 'Ipsum' 
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $article = factory(Article::class)->create([
            'title' => 'First Article',
            'body' => 'First Body',
        ]);

        $this->json('DELETE', '/api/articles/' . $article->id, [], $this->auth_bundle->headers)
            ->assertStatus(204);
    }

    public function testArticlesAreListedCorrectly()
    {
        factory(Article::class)->create([
            'title' => 'First Article',
            'body' => 'First Body'
        ]);

        factory(Article::class)->create([
            'title' => 'Second Article',
            'body' => 'Second Body'
        ]);


        $response = $this->json('GET', '/api/articles', [], $this->auth_bundle->headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'title' => 'First Article', 'body' => 'First Body' ],
                [ 'title' => 'Second Article', 'body' => 'Second Body' ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'body', 'title', 'created_at', 'updated_at'],
            ]);
    }
}
