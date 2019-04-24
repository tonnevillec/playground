<?php
namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\InputType;

class LogoType extends InputType {

    public function getTemplate ()
    {
        return 'fields.logo';
    }

    public function getDefaults ()
    {
        return [];
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        return parent::render($options, $showLabel, $showField, $showError);
    }

    public function getType()
    {
        return 'file';
    }
}