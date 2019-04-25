<?php

namespace App\Models;


use App\Concerns\AttachableConcern;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Posts extends Model
{
    use AttachableConcern;

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

    public static function draft ()
    {
        return self::firstOrCreate(['title' => 'Brouillon', 'author_id' => Auth::user()->id], [
            'content' => '',
            'slug' => '',
            'author_id' => Auth::user()->id
        ]);
    }
}
