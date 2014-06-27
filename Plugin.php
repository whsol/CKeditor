<?php
/**
 * Created by ShahiemSeymor.
 * Date: 6/9/14
 */

namespace ShahiemSeymor\Ckeditor;

use App;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;
use Event;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'CKeditor for Octobercms',
            'description' => 'Wysiwyg editor',
            'author' => 'ShahiemSeymor',
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'ShahiemSeymor\Ckeditor\FormWidgets\Wysiwyg' => [
                'label' => 'Wysiwyg',
                'alias' => 'wysiwyg'
            ]
        ];
    }
}
