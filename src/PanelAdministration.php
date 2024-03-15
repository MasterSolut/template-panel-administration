<?php

namespace Paneladministration\PanelAdministration;

class PanelAdministration
{
    protected $version;

    public function getVersion()
    {
        return $this->version;
    }

    public function routes()
    {
        require __DIR__.'/Routes/PanelAdministration.php';
    }
}
