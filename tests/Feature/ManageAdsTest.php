<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Ad;

class ManageAdsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function we_can_see_ads()
    {
        $this->withoutExceptionHandling();
        // given we have ads
        $ad = factory(Ad::class)->create();
        
        // we hit a url
        $this->get('ads')
            ->assertSee($ad->address);

        // then we see them
    }
}
