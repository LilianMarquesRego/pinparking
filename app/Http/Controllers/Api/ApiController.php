<?php

namespace App\Http\Controllers\Api;

use App\Ad;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function users()
    {
        return User::withCount('ads')
                ->orderBy('ads_count', 'desc')
                ->get();
    }

    public function ads()
    {
        return Ad::withCount('users')
                ->orderBy('users_count', 'desc')
                ->get();
    }

    public function transactions()
    {
        return DB::table('ad_user')
            ->select(DB::raw('count(*) transaction_count'), 'created_at')
            ->groupBy('created_at')
            ->get();
    }
}
