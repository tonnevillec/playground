<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $fillable = [
        'content', 'title'
    ];

    public function tags () {
        return $this->belongsToMany(Tags::class);
    }
}
