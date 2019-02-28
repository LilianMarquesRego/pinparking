<?php

namespace Tests\Feature;

use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\User;

class ManageAdsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_see_ads()
    {
        $ad = factory(Ad::class)->create();
        
        $this->get('ads')
            ->assertSee($ad->price);
    }

    /** @test */
    public function a_user_can_see_an_ad()
    {
        $ad = factory(Ad::class)->create();

        $this->get(route('ads.show', $ad->id))
            ->assertSee($ad->price);
    }

    /** @test */
    public function an_owner_can_register_a_parking_space()
    {
        Storage::fake('public');

        Storage::disk('public')->makeDirectory('small');
        
        $file = UploadedFile::fake()->image('parking-space.jpg');
        
        $ad = factory(Ad::class)->make();

        $ad = array_merge($ad->toArray(), ['image' => $file]);

        $this->post(route('ads.store'), $ad);

        $this->assertDatabaseHas('ads', [
            'address' => $ad['address'],
        ]);

        Storage::disk('public')->assertExists($file->hashName());
        Storage::disk('public')->assertExists('small/' . $file->hashName());
    }
    
    /** @test */
    public function a_user_can_softdelete_his_ad()
    {
        $user = factory(User::class)->create();
        
        $ad = factory(Ad::class)->create(['owner_id' => $user]);
        factory(Ad::class)->create(['owner_id' => $user]);
    
        $user->ads()->attach([1, 1, 2]);

        $this->assertEquals(3, $user->ads->count());
        
        $this->delete('ads/1');
        
        $this->assertNull(Ad::find(1));
        $this->assertEquals(1, Ad::count());
        $this->assertEmpty($ad->fresh()->transactions);
        $this->assertTrue($ad->fresh()->trashed());
    }
    
    /** @test */
    public function a_user_can_restore_his_ad()
    {
        $user = factory(User::class)->create();
        
        $ad = factory(Ad::class)->create(['owner_id' => $user]);
        
        $user->ads()->attach([1, 1]);
        
        $this->delete('ads/1');
        $this->assertEquals(0, Ad::count());
        $this->assertEmpty($ad->fresh()->transactions);
        
        $this->post('restore/ads/1');
        $this->assertEquals(1, Ad::count());
        $this->assertEquals(2, $ad->fresh()->transactions->count());
    }
}
