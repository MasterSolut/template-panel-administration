<?php

namespace Paneladministration\PanelAdministration\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Paneladministration\PanelAdministration\PanelAdministration
 */
class PanelAdministration extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Paneladministration\PanelAdministration\PanelAdministration::class;
    }
}
