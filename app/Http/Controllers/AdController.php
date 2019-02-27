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
        $response = \Zttp\Zttp::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $ad->address,
            'key' => 'my_key',
        ]);

        dd($response->json()['results'][0]['geometry']['location']);

        return view('ads.show', [
            'ad' => $ad,
        ]);
    }
}
