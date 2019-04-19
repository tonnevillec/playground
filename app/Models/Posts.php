<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $fillable = [
        'content', 'title', 'author_id', 'publie'
    ];

    public function tags () {
        return $this->belongsToMany(Tags::class);
    }

    public function author ()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
