<?php

    namespace Martin\Quotes\Components;

    use Lang;
    use Cms\Classes\ComponentBase;
    use Cms\Classes\Page;
    use Martin\Quotes\Models\Item;

    class Quotes extends ComponentBase {

        public $quotes;

        public function componentDetails() {
            return [
                'name'        => 'martin.quotes::lang.components.quotes.name',
                'description' => 'martin.quotes::lang.components.quotes.description'
            ];
        }

        public function defineProperties() {

            $properties['interval'] = [
                'title'             => Lang::get('martin.quotes::lang.components.quotes.interval_title'),
                'description'       => Lang::get('martin.quotes::lang.components.quotes.interval_desc'),
                'type'              => 'string',
                'default'           => 3000,
                'showExternalParam' => false
            ];

            $properties['pause'] = [
                'title'             => Lang::get('martin.quotes::lang.components.quotes.pause_title'),
                'description'       => Lang::get('martin.quotes::lang.components.quotes.pause_desc'),
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false
            ];

            $properties['random'] = [
                'title'             => Lang::get('martin.quotes::lang.components.quotes.random_title'),
                'description'       => Lang::get('martin.quotes::lang.components.quotes.random_desc'),
                'type'              => 'checkbox',
                'default'           => false,
                'showExternalParam' => false
            ];

            $properties['jquery'] = [
                'title'             => Lang::get('martin.quotes::lang.components.quotes.jquery_title'),
                'type'              => 'dropdown',
                'default'           => 'maxcdn',
                'placeholder'       => 'Select source',
                'options'           => ['maxcdn' => 'Yes, from MaxCDN', 'no' => 'No'],
                'showExternalParam' => false
            ];

            $properties['bootstrap'] = [
                'title'             => Lang::get('martin.quotes::lang.components.quotes.bootstrap_title'),
                'type'              => 'dropdown',
                'default'           => 'maxcdn',
                'placeholder'       => 'Select source',
                'options'           => ['maxcdn' => 'Yes, from MaxCDN', 'no' => 'No'],
                'showExternalParam' => false
            ];

            $properties['fa'] = [
                'title'             => Lang::get('martin.quotes::lang.components.quotes.fa_title'),
                'type'              => 'dropdown',
                'default'           => 'maxcdn',
                'placeholder'       => 'Select source',
                'options'           => ['maxcdn' => 'Yes, from MaxCDN', 'no' => 'No'],
                'showExternalParam' => false
            ];

            return $properties;

        }

        public function onRun() {

            if($this->properties['jquery'] == 'maxcdn') {
                $this->addJs('//code.jquery.com/jquery-2.1.3.min.js');
            }

            if($this->properties['bootstrap'] == 'maxcdn') {
                $this->addCss('//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css');
                $this->addJs('//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js');
            }

            if($this->properties['fa'] == 'maxcdn') {
                $this->addCss('//maxcdn.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
            }

            $this->addCss('/plugins/martin/quotes/assets/css/quotes.css');

            if($this->properties['random']) {
                $this->quotes = Item::orderByRaw("RAND()")->get()->take(1);
            } else {
                $this->quotes = Item::orderBy('id', 'asc')->get();
            }

        }
    }

?>