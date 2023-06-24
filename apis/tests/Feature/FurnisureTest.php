<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Furnisure;

class FurnisureTest extends TestCase
{
    use RefreshDatabase;

    public function testVisitorCanSeeAFurnisurePropertyDetails()
    {
        $this->withoutExceptionHandling();
        $furnisure = factory(Furnisure::class)->create();

        $response = $this->json('GET', '/api/furnisures/'.$furnisure->id);
        $response->assertStatus(200)
        ->assertJson([
            "data" => [
                'id' => $furnisure->id,
                // 'image_url_set' => $Furnisure->image_url_set,
                'title' => $furnisure->title,
                'furnisure_type_id' => $furnisure->furnisure_type_id,
                'description' => $furnisure->description,
                'cost_per_month' => $furnisure->cost_per_month,
                'is_available' => $furnisure->is_available,
                'is_favourite' => $furnisure->is_favourite,
            ]
        ]);
    }

    public function testVisitorCanSeeAllPublishedFurnisureProperties()
    {
        $this->withoutExceptionHandling();

        $Furnisures = factory(Furnisure::class, 10)->create();

        $response = $this->json('GET', '/api/furnisures/');
        $total_data = count($response->original['data']);

        $this->assertEquals(10, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                    
                ]
            ]);
    }

    public function testVisitorCanSeeAllPublishedFurnisuresWithOffsetAndLimit()
    {
        $this->withoutExceptionHandling();

        $Furnisures = factory(Furnisure::class, 10)->create();
        $limit = 6;
        $offset = 1;

        $response = $this->json('GET', '/api/furnisures/'.$offset.'/'.$limit);
        $total_data = count($response->original['data']);

        $this->assertEquals($limit, $total_data);
        $response->assertStatus(200)
        ->assertJsonStructure([
                'data' => [
                   "".$limit => [
                       
                   ]
                ]
            ]);
    }

    public function testVisitorCanFilterAllPublishedFurnisuresWithParameters()
    {   
        $this->withoutExceptionHandling();

        $limit = 5;
        $Furnisures = factory(Furnisure::class, 20)->create([
            'cost_per_month' => 510,
            'furnisure_type_id' => 3
        ]);

        $filter_data = [
            'offset' => 0,
            'limit' => $limit,
            'min_price' => 450,
            'max_price' => 3000,
            'furnisure_type_id' => 3
        ];

        $response = $this->json('GET', '/api/furnisures_filter/', $filter_data);
        $total_data = count($response->original['data']);
        $res_data = $response->original['data'];

        $this->assertEquals(5, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                   
                ]
            ]);
    }
}
