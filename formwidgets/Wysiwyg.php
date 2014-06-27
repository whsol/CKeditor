<?php namespace ShahiemSeymor\Ckeditor\FormWidgets;

use Backend\Classes\FormWidgetBase;

class Wysiwyg extends FormWidgetBase
{

   public function widgetDetails()
    {
        return [
            'name'        => 'Ckeditor',
            'description' => 'Renders a wysiwyg field.'
        ];
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('wysiwyg');
    }

    public function prepareVars()
    {
         $this->vars['name'] = $this->formField->getName();
         $this->vars['value'] = $this->model->{$this->columnName};
    }

    public function loadAssets()
    {
        $this->addJs('ckeditor/ckeditor.js');
        $this->addJs('ckeditor/adapters/jquery.js');  
    }


}