<?php

namespace App\Http\Controllers;

use App\Ad;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index()
    {
        if (request()->wantsJson()) {
            [$column, $sorted] = explode('.', request('orderBy'));
            return Ad::orderBy($column, $sorted)->get();
        }

        return view('ads.index', [
            'ads' => Ad::latest()->get(),
        ]);
    }

    public function show(Ad $ad)
    {
        // if (! $ad->latitude) {
        //     $location = \Zttp\Zttp::get("https://maps.googleapis.com/maps/api/geocode/json", [
        //         'address' => $ad->address,
        //         'key' => 'my_key',
        //     ])->json()['results'][0]['geometry']['location'];

        //     $ad->latitude = $location['lat'];

        //     $ad->longitude = $location['lng'];

        //     $ad->save();
        // }

        return view('ads.show', [
            'ad' => $ad,
        ]);
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store()
    {
        $path = request()->file('image')->store('/', 'public');

        Image::make(request()->file('image'))->resize(600, 400)
            ->save(Storage::disk('public')->path('small/') . $path);

        $ad = request()->except('_token', 'image') + [
            'image' => $path,
            'owner_id' => 1,
        ];

        Ad::create($ad);

        return redirect('ads');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        $ad->transactions->each->delete();
    }
}
