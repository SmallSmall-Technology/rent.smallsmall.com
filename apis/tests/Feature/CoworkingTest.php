<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Coworking;
use App\User;

class CoworkingTest extends TestCase
{
    use RefreshDatabase;

    public function testVisitorCanSeeACoworkingPropertyDetails()
    {
        $this->withoutExceptionHandling();
        $coworking = factory(Coworking::class)->create();

        $response = $this->json('GET', '/api/coworkings/'.$coworking->id);
        $response->assertStatus(200)
        ->assertJson([
            "data" => [
                'id' => $coworking->id,
                // 'image_url_set' => $coworking->image_url_set,
                'title' => $coworking->title,
                'cost_per_month' => $coworking->cost_per_month,
                'location_id' => $coworking->location_id,
                'address' => $coworking->address,
                'people_per_space' => $coworking->people_per_space,
                'with_parking' => $coworking->with_parking,
                'with_generator' => $coworking->with_generator,
                'is_furnished' => $coworking->is_furnished,
                'is_rented' => $coworking->is_rented,
                'is_favourite' => $coworking->is_favourite,
            ]
        ]);
    }

    public function testVisitorCanSeeAllPublishedCoworkings()
    {
        $this->withoutExceptionHandling();

        $Coworkings = factory(Coworking::class, 10)->create();
        $response = $this->json('GET', '/api/coworkings/');
        $total_data = count($response->original['data']);

        $this->assertEquals(10, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                    
                ]
            ]);
    }

    public function testVisitorCanSeeAllPublishedCoworkingsWithOffsetAndLimit()
    {
        $Coworkings = factory(Coworking::class, 10)->create();
        $limit = 5;
        $offset = 1;

        $response = $this->json('GET', '/api/coworkings/'.$offset.'/'.$limit);
        $total_data = count($response->original['data']);

        $this->assertEquals($limit, $total_data);
        $response->assertStatus(200)
        ->assertJsonStructure([
                'data' => [
                   
                ]
            ]);
    }

    public function testVisitorCanFilterAllPublishedCoworkingsWithParameters()
    {
        $this->withoutExceptionHandling();
        $limit = 5;
        $Coworkings = factory(Coworking::class, 20)->create([
            'cost_per_month' => 500,
            'space_type' => 0,
            'interest' => 0,
            'car_parking' => 0,
            'location_id' => 200,
        ]);

        $filter_data = [
            'offset' => 0,
            'limit' => $limit,
            'min_price' => 450,
            'max_price' => 3000,
            'space_type' => 0,
            'interest' => 0,
            'car_parking' => 0,
            'location_id' => 200,
        ];

        $response = $this->json('GET', '/api/coworkings_filter/', $filter_data);
        $total_data = count($response->original['data']);
        $res_data = $response->original['data'];

        $this->assertEquals(5, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                   
                ]
            ]);
    }

    public function testUserCanRequestForCoworkingInspection()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $coworking = factory(Coworking::class)->create();

        $inspection_data = [
            'coworking_id' => $coworking->id,
            'user_id' => $user->id,
            'dateTime' => round(microtime(true) * 1000)
        ];

        $response = $this->actingAs($user, 'api')->json('POST', 'api/coworkings_inspection', $inspection_data);
        $inspection = $user->coworking_inspection()->find($coworking->id);

        $this->assertNotEmpty($inspection);
        $this->assertEquals($inspection->user_id, $user->id);
        $this->assertEquals($inspection->coworking_id, $coworking->id);
        $this->assertEquals($inspection->inspection_time, date('Y-m-d H:i:s', round($inspection_data['dateTime'] / 1000)));

        $response->assertStatus(200)
        ->assertJson([
            'data' => 'success'
        ]);
    }
}
