<?php

    namespace Martin\Quotes;

    use Backend;
    use Controller;
    use System\Classes\PluginBase;

    class Plugin extends PluginBase {

        public function pluginDetails() {
            return [
                'name'        => 'martin.quotes::lang.plugin.name',
                'description' => 'martin.quotes::lang.plugin.description',
                'author'      => 'Martin',
                'icon'        => 'icon-quote-right'
            ];
        }

        public function registerNavigation() {
            return [
                'quotes' => [
                    'label'       => 'martin.quotes::lang.navigation.label',
                    'url'         => Backend::url('martin/quotes/items'),
                    'permissions' => ['martin.quotes.access_quotes'],
                    'icon'        => 'icon-quote-right',
                    'iconSvg'     => 'plugins/martin/quotes/assets/imgs/icon.svg',
                    'order'       => 500,
                    'sideMenu' => [
                        'items' => [
                            'label' => 'martin.quotes::lang.navigation.sideMenu.items',
                            'icon'  => 'icon-list',
                            'url'   => Backend::url('martin/quotes/items')
                        ],
                    ]
                ]
            ];
        }

        public function registerPermissions() {
            return [
                'martin.quotes.access_quotes' => ['label' => 'Access Quotes page', 'tab' => 'Quotes'],
            ];
        }

        public function registerComponents() {
            return [
                'Martin\Quotes\Components\Quotes' => 'quotes'
            ];
        }

    }

?>