<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
        if($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('users.update', $this->getModel()->id);
        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url
        ];

        $this
            ->add('email', 'email', [
                'label' => 'Email',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('pseudo', 'text', [
                'label' => 'Pseudo',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('firstname', 'text', [
                'label' => 'Nom',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('lastname', 'text', [
                'label' => 'Prenom',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('twitter', 'text', [
                'label' => 'Twitter',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('website', 'text', [
                'label' => 'Site web',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('admin', 'switch', [
                'value' => 1,
                'label' => 'Administrateur',
                'attr' => [
                    'class' => 'success'
                ]
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
