<?php

namespace App\Forms;

use App\Models\Tags;
use Kris\LaravelFormBuilder\Form;

class PostsForm extends Form
{
    public function buildForm()
    {
        if($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('posts.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('posts.store');
        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url
        ];

        $this
            ->add('title', 'text', [
                'label' => 'Titre',
                'rules' => 'required|min:5'
            ])
            ->add('content', 'textarea', [
                'rules' => 'required',
                'label' => 'Contenu'
            ])
            ->add('publie', 'checkbox', [
                'value' => 1
            ])
            ->add('tags', 'entity', [
                'class' => Tags::class,
                'multiple' => true,
                'property' => 'name',
            ])
        ;

        $this->add('submit', 'submit', [
            'label' => 'Valider',
            'attr' => [
                'class' => 'form-control btn btn-success'
            ],
        ]);
    }
}
