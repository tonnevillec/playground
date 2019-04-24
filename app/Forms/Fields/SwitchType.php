<?php
namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\CheckableType;

class SwitchType extends CheckableType {

    public function getTemplate ()
    {
        return 'fields.switch';
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