<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Transaction extends Pivot
{
    protected $table = 'transactions';

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
