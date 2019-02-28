<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Pivot
{
    use SoftDeletes;

    protected $table = 'transactions';
}
