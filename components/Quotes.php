<?php

    namespace Martin\Quotes\Components;

    use Cms\Classes\ComponentBase;
    use Cms\Classes\Page;
    use Martin\Quotes\Models\Item;
    use Lang;

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
                'title'             => 'Interval',
                'description'       => 'Time to delay between cycling an item',
                'type'              => 'string',
                'default'           => 3000,
                'showExternalParam' => false
            ];

            $properties['pause'] = [
                'title'             => 'Pause',
                'description'       => 'Pause on mouseover',
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false
            ];

            $properties['jquery'] = [
                'title'             => 'Load jQuery?',
                'type'              => 'dropdown',
                'default'           => 'maxcdn',
                'placeholder'       => 'Select source',
                'options'           => ['maxcdn' => 'Yes, from MaxCDN', 'no' => 'No'],
                'showExternalParam' => false
            ];

            $properties['bootstrap'] = [
                'title'             => 'Load Bootstrap?',
                'type'              => 'dropdown',
                'default'           => 'maxcdn',
                'placeholder'       => 'Select source',
                'options'           => ['maxcdn' => 'Yes, from MaxCDN', 'no' => 'No'],
                'showExternalParam' => false
            ];

            $properties['fa'] = [
                'title'             => 'Load Font Awesome?',
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
            $this->quotes = Item::orderBy('id', 'asc')->get();

        }

    }

?>