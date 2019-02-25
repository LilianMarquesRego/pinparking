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
            switch (request('orderBy')) {
                case 'asc':
                    return Ad::orderBy('price', 'asc')->get();
                break;
                
                case 'desc':
                    return Ad::orderBy('price', 'desc')->get();
                break;
                
                default:
                    return Ad::latest()->get();
            }
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
