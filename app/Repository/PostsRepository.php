<?php

namespace App\Repository;

use App\Models\Posts;

class PostsRepository {

    /**
     * @var Posts
     */
    private $posts;

    /**
     * PostsRepository constructor.
     * @param Posts $posts
     */
    public function __construct (Posts $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getPublished()
    {
        return $this->posts->newQuery()
            ->where('publie', '=', true)
            ->get();
    }
}