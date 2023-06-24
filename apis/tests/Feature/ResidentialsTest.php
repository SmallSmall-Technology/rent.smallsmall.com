<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Residential;
use App\User;
use App\ResidentialInspection;
use Illuminate\Support\Carbon;

class ResidentialsTest extends TestCase
{
    use RefreshDatabase;

    public function testVisitorCanSeeAResidentialPropertyDetails()
    {
        $this->withoutExceptionHandling();
        $residential = factory(Residential::class)->create();

        $response = $this->json('GET', '/api/residentials/'.$residential->id);
        $response->assertStatus(200)
        ->assertJson([
            "data" => [
                'id' => $residential->id,
                // 'image_url_set' => $residential->image_url_set,
                'title' => $residential->title,
                'location_id' => $residential->location_id,
                'cost_per_month' => $residential->cost_per_month,
                'num_of_rooms' => $residential->num_of_rooms,
                'num_of_baths' => $residential->num_of_baths,
                'is_rented' => $residential->is_rented,
                'room_type' => $residential->room_type,
                'furnishing' => $residential->furnishing
                // 'is_favourite' => $residential->is_favourite,
            ]
        ]);
    }

    public function testVisitorCanSeeAllPublishedResidentials()
    {
        $residentials = factory(Residential::class, 10)->create();

        $response = $this->json('GET', '/api/residentials/');
        $total_data = count($response->original['data']);

        $this->assertEquals(10, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                    
                ]
            ]);
    }

    public function testVisitorCanSeeAllPublishedResidentialsWithOffsetAndLimit()
    {
        $residentials = factory(Residential::class, 10)->create();
        $limit = 2;
        $offset = 1;

        $response = $this->json('GET', '/api/residentials/'.$offset.'/'.$limit);
        $total_data = count($response->original['data']);

        $this->assertEquals($limit, $total_data);
        $response->assertStatus(200)
        ->assertJsonStructure([
                'data' => [
                   
                ]
            ]);
    }

    public function testVisitorCanSeeAllPublishedFeaturedResidentials()
    {
        $residentials = factory(Residential::class, 10)->state('featured')->create();;

        $response = $this->json('GET', '/api/residentials_featured/');

        $total_data = count($response->original['data']);

        $this->assertEquals(10, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                   "1" => ["featured" => Carbon::now()]
                ]
            ]);
    }

    public function testVisitorCanSeeAllPublishedFeaturedResidentialsWithOffsetAndLimit()
    {
        $this->withoutExceptionHandling();
        $residentials = factory(Residential::class, 10)->state('featured')->create();
        $limit = 4;
        $offset = 4;

        $response = $this->json('GET', '/api/residentials_featured/'.$offset.'/'.$limit);

        $total_data = count($response->original['data']);

        $this->assertEquals($limit, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                   "".$limit => ["featured" => Carbon::now()]
                ]
            ]);
    }

    public function testVisitorCanFilterAllPublishedResidentialsWithParameters()
    {
        $limit = 5;
        $residentials = factory(Residential::class, 20)->create([
            'cost_per_month' => 500,
            'room_type' => 0,
            'furnishing' => 0,
            'location_id' => 200,
        ]);

        $filter_data = [
            'offset' => 0,
            'limit' => $limit,
            'min_price' => 450,
            'max_price' => 3000,
            'room_type' => 0,
            'furnishing' => 0,
            'location_id' => 200,
        ];

        $response = $this->json('GET', '/api/residentials_filter/', $filter_data);
        $total_data = count($response->original['data']);
        $res_data = $response->original['data'];

        $this->assertEquals(5, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                   
                ]
            ]);
    }

    public function testUserCanRequestForResidentialInspection()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $residential = factory(Residential::class)->create();

        $inspection_data = [
            'residential_id' => $residential->id,
            'user_id' => $user->id,
            'dateTime' => round(microtime(true) * 1000)
        ];

        $response = $this->actingAs($user, 'api')->json('POST', 'api/residentials_inspection', $inspection_data);
        $inspection = $user->residential_inspection()->find($residential->id);

        $this->assertNotEmpty($inspection);
        $this->assertEquals($inspection->user_id, $user->id);
        $this->assertEquals($inspection->residential_id, $residential->id);
        $this->assertEquals($inspection->inspection_time, date('Y-m-d H:i:s', round($inspection_data['dateTime'] / 1000)));

        $response->assertStatus(200)
        ->assertJson([
            'data' => 'success'
        ]);
    }
}
