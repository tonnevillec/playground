<?php

namespace App\Http\Controllers\Admin;

use App\Forms\UsersForm;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

class UsersController extends Controller
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
        $this->entity = 'users';
    }

    public function index ()
    {
        $users = User::all();

        return view('back.users.index', [
            'users' => $users,
            'entity' => $this->entity,
        ]);
    }

    public function create ()
    {
        $form = $this->getForm(null);

        return view('back.users.edit', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    public function edit (User $user)
    {
        $user = $user ?: null;

        $form = $this->getForm($user);

        return view('back.users.edit', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    public function update (User $user, Request $request)
    {
        $form = $this->getForm($user);
        $form->redirectIfNotValid();

        $user = $this->process($form->getFieldValues(), $user);

        return redirect()->route('users.index');
    }

    public function store (Request $request)
    {
        $form = $this->getForm();
        $form->redirectIfNotValid();

        $user = $this->process($form->getFieldValues());

        return redirect()->route('users.index');
    }

    public function process ($datas, User $user = null)
    {
        $datas['admin'] = !isset($datas['admin']) || is_null($datas['admin']) ? false : true;

        $values = collect($datas);
//        $values = collect($datas)->filter(function ($item) {
//            return !is_null($item);
//        });



        if($user !== null) {
            $user->fill($values->toArray());
        }

        $user->save();

        return $user;
    }


    private function getForm(?User $user = null)
    {
        $user = $user ?: new User();
        return $this->formBuilder->create(UsersForm::class, [
            'model' => $user
        ]);
    }
}
