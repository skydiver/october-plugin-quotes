<?php

    namespace Martin\Quotes\Models;

    use Model;

    class Item extends Model {

        use \October\Rain\Database\Traits\Validation;

        public $table        = 'martin_quotes_items';
        public $translatable = ['quote', 'author', 'link', 'image'];

        public $rules = [
            'quote' => 'required',
        ];

        public $customMessages = [
            'link.url' => 'The link format is invalid (http:// or https://)'
        ];

        public static function boot() {
            parent::boot();
            if(!class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
                return;
            }
            self::extend(function($model){
                $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';
            });
        }

    }

?>