<?php

namespace App\Http\Controllers;

use App\Ad;

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
        if (! $ad->latitude) {
            $location = \Zttp\Zttp::get("https://maps.googleapis.com/maps/api/geocode/json", [
                'address' => $ad->address,
                'key' => 'my_key',
            ])->json()['results'][0]['geometry']['location'];

            $ad->latitude = $location['lat'];

            $ad->longitude = $location['lng'];

            $ad->save();
        }

        return view('ads.show', [
            'ad' => $ad,
        ]);
    }
}
