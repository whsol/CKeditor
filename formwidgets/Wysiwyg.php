<?php namespace ShahiemSeymor\Ckeditor\FormWidgets;

use Backend\Classes\FormWidgetBase;
use ShahiemSeymor\Ckeditor\Models\Settings;
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
         $this->vars['up_public'] = Settings::instance()->up_public;
   
    }

    public function loadAssets()
    {
        $this->addJs('ckeditor/ckeditor.js');
        $this->addJs('ckeditor/adapters/jquery.js');  
    }

}