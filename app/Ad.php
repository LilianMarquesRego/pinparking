<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'transactions');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
