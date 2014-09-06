<?php namespace ShahiemSeymor\Ckeditor\FormWidgets;

use Backend\Classes\FormWidgetBase;
use ShahiemSeymor\Ckeditor\Models\Settings;
use RainLab\Translate\Models\Locale;

class TWysiwyg extends \RainLab\Translate\FormWidgets\MLControl
{
    public $defaultLocale = '';

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('twysiwyg');
    }

    public function prepareVars()
    {
        parent::prepareVars();
        $this->vars['name']      = $this->formField->getName();
        $this->vars['value']     = $this->model->{$this->columnName};
        $this->vars['up_public'] = Settings::instance()->up_public;
        $this->vars['defaultLocale'] = Locale::getDefault();
        $this->vars['locales'] = Locale::listAvailable();

    }

    public function loadAssets()
    {
        parent::prepareVars();
        $this->addJs('/plugins/shahiemseymor/ckeditor/formwidgets/assets/ckeditor/ckeditor.js', 'ShahiemSeymor.Ckeditor');
        $this->addJs('/plugins/shahiemseymor/ckeditor/formwidgets/assets/ckeditor/adapters/jquery.js', 'ShahiemSeymor.Ckeditor');
    }
}
