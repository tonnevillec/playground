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
                'label' => 'Contenu',
                'attr' => [
                    'class' => 'trumbowyg',
                ]
            ])
            ->add('publie', 'switch', [
                'value' => 1,
                'label' => 'Publié',
                'attr' => [
                    'class' => 'success'
                ]
            ])
            ->add('headerTag', 'entity', [
                'class' => Tags::class,
                'multiple' => false,
                'property' => 'name',
                'label' => 'Tag principal'
            ])
            ->add('tags', 'entity', [
                'class' => Tags::class,
                'multiple' => true,
                'expanded' => false,
                'property' => 'name',
                'empty_value' => '=== Sélection de 1 ou plusieurs tags ==='
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
