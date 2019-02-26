<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
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
        return view('ads.show', [
                'ad' => $ad,
                ]);
    }
}
