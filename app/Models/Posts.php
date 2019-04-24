<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $fillable = [
        'content', 'title', 'author_id', 'publie', 'slug'
    ];

    public function tags ()
    {
        return $this->belongsToMany(Tags::class)->wherePivot('header_tag', '=', false);
    }

    public function headerTag ()
    {
        return $this->belongsToMany(Tags::class)->wherePivot('header_tag', '=',true);
    }

    public function author ()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function attachments ()
    {
        return $this->morphMany(Attachments::class, 'attachable');
    }
}
