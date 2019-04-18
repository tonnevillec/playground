<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{

    public $timestamps = false;

    public $guarded = [];

    public function posts () {
        return $this->belongsToMany(Posts::class);
    }
}
