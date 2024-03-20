<?php

namespace Paneladministration\PanelAdministration;

use Paneladministration\PanelAdministration\Models\Droit;
use Paneladministration\PanelAdministration\Models\Menu;
use Paneladministration\PanelAdministration\Models\SousMenu;
use Paneladministration\PanelAdministration\Models\TypeUser;
use Paneladministration\PanelAdministration\Models\User;
use Illuminate\Support\Arr;



class PanelAdministration
{
    protected $viewLoadingEvents = [];
    protected $version;
    public function getVersion()
    {
        return $this->version;
    }
    public static function routes()
    {
        require __DIR__ . '/Routes/PanelAdministration.php';
    }
    protected $models = [
        'Droit' => Droit::class,
        'Utilisateur' => User::class,
        'Menu' => Menu::class,
        'SousMenu' => SousMenu::class,
        'TypeUser' => TypeUser::class
    ];
    public function view($name, array $parameters = [])
    {
        foreach (Arr::get($this->viewLoadingEvents, $name, []) as $event) {
            $event($name, $parameters);
        }

        return view($name, $parameters);
    }
}
