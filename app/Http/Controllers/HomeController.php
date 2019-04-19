<?php

namespace App\Http\Controllers;

use App\Repository\PostsRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * @var PostsRepository
     */
    private $repository;

    /**
     * HomeController constructor.
     * @param PostsRepository $postsRepository
     */
    public function __construct (PostsRepository $postsRepository)
    {
        $this->repository = $postsRepository;
    }

    /**
     * Show the blog page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->repository->getPublished()->sortByDesc('created_at');

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
}
