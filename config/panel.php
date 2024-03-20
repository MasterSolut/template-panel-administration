<?php

// config for Paneladministration/PanelAdministration

use Paneladministration\PanelAdministration\PanelAdministrationServiceProvider;

return [

    'controllers' => [
        'namespace' => 'Paneladministration\\PanelAdministration\\Htpp\\Controllers',
    ],

    'models' => [
        'namespace' => 'PanelAdministration\\PanelAdministration\\Models\\',
    ],

    'commands' => [
        'namespace' => 'Paneladministration\\PanelAdministration\\Commands',
    ],

    PanelAdministrationServiceProvider::class,
];
