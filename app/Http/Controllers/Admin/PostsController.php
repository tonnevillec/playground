<?php

namespace App\Http\Controllers\Admin;

use App\Forms\PostsForm;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\FormBuilder;

class PostsController extends Controller
{
    /**
     * @var FormBuilder
     */
    private $formBuilder;

    /**
     * @var string
     */
    private $entity;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct (FormBuilder $formBuilder)
    {
        $this->middleware('auth');

        $this->formBuilder = $formBuilder;
        $this->entity = 'posts';
    }

    public function index ()
    {
        $posts = Posts::all()->sortByDesc('created_at');

        return view('back.posts.index', [
            'posts' => $posts,
            'entity' => $this->entity,
        ]);
    }

    public function create ()
    {
        $form = $this->getForm(null);

        return view('back.posts.edit', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    public function edit (Posts $post)
    {
        $post = $post ?: null;

        $form = $this->getForm($post);

        return view('back.posts.edit', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    public function update (Posts $post, Request $request)
    {
        $form = $this->getForm($post);
        $form->redirectIfNotValid();

        $post = $this->process($form->getFieldValues(), $post);

        return redirect()->route('posts.index');
    }

    public function store (Request $request)
    {
        $form = $this->getForm();
        $form->redirectIfNotValid();

        $post = $this->process($form->getFieldValues());

        return redirect()->route('posts.index');
    }


    public function process ($datas, Posts $post = null)
    {
        $values = collect($datas)->filter(function ($item) {
            return !is_null($item);
        });

        $values['slug'] = Str::slug($values['title'], '-');

        if($post !== null) {
            $post->fill($values->toArray());
        } else {
            $post = new Posts($values->toArray());
        }

        $post->publie = $values->has('publie');
        $post->author()->associate(Auth::user());

        $post->save();

        if($values->has('headerTag')){
//            $headerTags[$values['headerTag']] = ['header_tag' => true];
            $post->headerTag()->sync([$values['headerTag'] => ['header_tag' => true]]);
        }

        $tags = [];

        if($values->has('tags') && count($values->get('tags')) !== 0 ){
            foreach ($values['tags'] as $tag) {
                if($tag !== $values->get('headerTag') && $tag !== null) {
                    $tags[$tag] = ['header_tag' => false];
                }
            }
        }
        $post->tags()->sync($tags);

        return $post;
    }


    public function destroy ($id)
    {
        $p = Posts::findOrFail($id);
        $p->delete();

        return redirect()->route('posts.index');
    }

    private function getForm(?Posts $post = null)
    {
        $post = $post ?: new Posts();
        return $this->formBuilder->create(PostsForm::class, [
            'model' => $post
        ]);
    }
}
