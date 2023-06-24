<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Storage;
use App\User;

class StorageTest extends TestCase
{
    use RefreshDatabase;

    public function testVisitorCanSeeAStoragePropertyDetails()
    {
        $this->withoutExceptionHandling();
        $storage = factory(Storage::class)->create();

        $response = $this->json('GET', '/api/storages/'.$storage->id);
        $response->assertStatus(200)
        ->assertJson([
            "data" => [
                'id' => $storage->id,
                // 'image_url_set' => $storage->image_url_set,
                'title' => $storage->title,
                'location_id' => $storage->location_id,
                'address' => $storage->address,
                'description' => $storage->description,
                'cost_per_month' => $storage->cost_per_month,
                'box_per_space' => $storage->box_per_space,
                'furnisure_per_space' => $storage->furnisure_per_space,
                'is_rented' => $storage->is_rented,
                'with_security' => $storage->with_security,
                'with_furnisure' => $storage->with_furnisure,
                'is_favourite' => $storage->is_favourite,
            ]
        ]);
    }

    public function testVisitorCanSeeAllPublishedStorageProperties()
    {
        $this->withoutExceptionHandling();

        $storages = factory(Storage::class, 10)->create();

        $response = $this->json('GET', '/api/storages/');
        $total_data = count($response->original['data']);

        $this->assertEquals(10, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                    
                ]
            ]);
    }

    public function testVisitorCanSeeAllPublishedstoragesWithOffsetAndLimit()
    {
        $this->withoutExceptionHandling();

        $storages = factory(Storage::class, 10)->create();
        $limit = 6;
        $offset = 1;

        $response = $this->json('GET', '/api/storages/'.$offset.'/'.$limit);
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

    public function testVisitorCanFilterAllPublishedstoragesWithParameters()
    {   
        $this->withoutExceptionHandling();

        $limit = 5;
        $storages = factory(Storage::class, 20)->create([
            'cost_per_month' => 510,
            'sqm' => 100,
            'location_id' => 200,
        ]);

        $filter_data = [
            'offset' => 0,
            'limit' => $limit,
            'min_price' => 450,
            'max_price' => 3000,
            'min_sqm' => 50,
            'max_sqm' => 140,
            'location_id' => 200,
        ];

        $response = $this->json('GET', '/api/storages_filter/', $filter_data);
        $total_data = count($response->original['data']);
        $res_data = $response->original['data'];

        $this->assertEquals(5, $total_data);
        $response->assertStatus(200)
        ->assertJson([
                'data' => [
                   
                ]
            ]);
    }

    public function testUserCanRequestForStorageInspection()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $storage = factory(storage::class)->create();

        $inspection_data = [
            'storage_id' => $storage->id,
            'user_id' => $user->id,
            'dateTime' => round(microtime(true) * 1000)
        ];

        $response = $this->actingAs($user, 'api')->json('POST', 'api/storages_inspection', $inspection_data);
        $inspection = $user->storage_inspection()->find($storage->id);

        $this->assertNotEmpty($inspection);
        $this->assertEquals($inspection->user_id, $user->id);
        $this->assertEquals($inspection->storage_id, $storage->id);
        $this->assertEquals($inspection->inspection_time, date('Y-m-d H:i:s', round($inspection_data['dateTime'] / 1000)));

        $response->assertStatus(200)
        ->assertJson([
            'data' => 'success'
        ]);
    }
}
