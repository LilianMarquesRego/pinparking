<?php

namespace Tests\Feature;

use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

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
    
    /** @test */
    public function an_owner_can_upload_an_image()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');

        Storage::disk('public')->makeDirectory('small');
        
        $file = UploadedFile::fake()->image('parking-space.jpg');
        
        $ad = factory(Ad::class)->make();

        $ad = $ad->toArray() + ['image' => $file];

        $this->post(route('ads.store'), $ad);

        $this->assertDatabaseHas('ads', [
            'address' => $ad['address'],
        ]);

        Storage::disk('public')->assertExists($file->hashName());
        Storage::disk('public')->assertExists('small/' . $file->hashName());
    }
}
