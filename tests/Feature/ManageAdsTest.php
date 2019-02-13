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
    public function a_user_can_see_ads()
    {
        $ad = factory(Ad::class)->create();
        
        $this->get('ads')
            ->assertSee($ad->address);
    }

    /** @test */
    public function a_user_can_see_an_ad()
    {
        $ad = factory(Ad::class)->create();

        $this->get(route('ads.show', $ad->id))
            ->assertSee($ad->address);
    }

    /** @test */
    public function an_owner_can_register_a_parking_space()
    {
        $ad = factory(Ad::class)->make();

        $this->post(route('ads.store'), $ad->toArray());

        $this->assertDatabaseHas('ads', [
            'address' => $ad->address,
        ]);
    }
}
