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
use ShahiemSeymor\Ckeditor\Models\Settings;

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
            ],
            ,
            'ShahiemSeymor\Ckeditor\FormWidgets\TWysiwyg' => [
                'label' => 'TWysiwyg',
                'alias' => 'twysiwyg'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'CKEditor',
                'description' => 'Manage CKEditor preferences.',
                'icon'        => 'icon-paperclip',
                'class'       => 'ShahiemSeymor\Ckeditor\Models\Settings',
                'order'       => 600
            ]
        ];
    }

    public function boot()
    {
        Event::listen('backend.form.extendFields', function($form) {
            // Only apply changes to Cms\Classes\Content form
            if ( empty($form->config->model) || !is_object($form->config->model) || get_class($form->config->model) != 'Cms\Classes\Content' )
                return;

            if (Settings::get('show_cms_content_as_wysiwyg', false))
            {
                foreach ($form->getFields() as $field )
                {
                    // Only apply changes to codeeditor fields
                    if ( empty($field->config['type']) || $field->config['type'] != 'codeeditor' )
                        continue;

                    $field->config['type'] = $field->config['widget'] = 'ShahiemSeymor\Ckeditor\FormWidgets\Wysiwyg';
                }
            }
        });
    }
}
