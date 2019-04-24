<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TagsForm extends Form
{
    public function buildForm()
    {
        if($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('tags.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('tags.store');
        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url
        ];

        $this
            ->add('name', 'text', [
                'label' => 'Nom',
                'rules' => 'required|min:3'
            ])
            ->add('icon', 'logo', [
                'label' => 'Icon',
                'prefix' => 'images/tags'
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
