<?php

namespace App\Http\Controllers\Admin;

use App\Forms\TagsForm;
use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\FormBuilder;

class TagsController extends Controller
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
        $this->entity = 'tags';
    }

    public function index ()
    {
        $tags = Tags::all();

        return view('back.tags.index', [
            'tags' => $tags,
            'entity' => $this->entity,
        ]);
    }

    public function create ()
    {
        $form = $this->getForm(null);

        return view('back.tags.edit', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    public function edit (Tags $tag)
    {
        $tag = $tag ?: null;

        $form = $this->getForm($tag);

        return view('back.tags.edit', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    public function update (Tags $tag, Request $request)
    {
        $form = $this->getForm($tag);
        $form->redirectIfNotValid();

        $tag = $this->process($form->getFieldValues(), $tag);

        return redirect()->route('tags.index');
    }

    public function store (Request $request)
    {
        $form = $this->getForm();
        $form->redirectIfNotValid();

        $tag = $this->process($form->getFieldValues());

        return redirect()->route('tags.index');
    }

    public function process ($datas, Tags $tag = null)
    {
        $values = collect($datas)->filter(function ($item) {
            return !is_null($item);
        });

        $storeName = '';
        $values->only(['icon'])
            ->each(function ($file) use (&$values, &$storeName) {
                if ($file->isValid()) {
                    $name = uniqid() . '_' . $file->getClientOriginalName();
                    $path = public_path('images/tags');

                    $file->move($path, $name);

                    $storeName = $name;
                }
        });

        if($storeName !== '') {$values['icon'] = $storeName; }

        $values['slug'] = Str::slug($values['name'], '-');

        if($tag !== null) {
            $tag->fill($values->toArray());
        } else {
            $tag = new Tags($values->toArray());
        }

        $tag->save();

        return $tag;
    }


    private function getForm(?Tags $tag = null)
    {
        $tag = $tag ?: new Tags();
        return $this->formBuilder->create(TagsForm::class, [
            'model' => $tag
        ]);
    }
}
