<?php

// config for Paneladministration/PanelAdministration

use Paneladministration\PanelAdministration\PanelAdministrationServiceProvider;

return [

    'controllers' => [
        'namespace' => 'Paneladministration\\PanelAdministration\\Htpp\\Controllers',
    ],

    'models' => [
        // 'namespace' => 'App\\Models\\',
    ],

    PanelAdministrationServiceProvider::class,
];
