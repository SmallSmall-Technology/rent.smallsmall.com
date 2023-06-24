<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Residential;
use Illuminate\Support\Carbon;

class ResidentialTest extends TestCase
{
    use RefreshDatabase;

    public function testNewResidentialIsNotFeatured()
    {
        $residential = factory(Residential::class)->create();
        $featured_residential = $residential->featured();
        $this->assertEmpty($featured_residential->featured);
    }

    public function testFeaturedResidentialCanBeRetrievedIfAvailable()
    {
        $residential = factory(Residential::class)->state('featured')->create();
        $featured_residential = $residential->featured();
        $this->assertNotEmpty($featured_residential->featured);
    }
}
