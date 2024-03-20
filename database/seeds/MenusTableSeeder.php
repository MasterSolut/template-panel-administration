<?php

namespace Paneladministration\PanelAdministration;

use Illuminate\Database\Seeder;
use Paneladministration\PanelAdministration\Models\Menu;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        Menu::firstOrCreate([
            'titre_menus' => 'admin',
        ]);
    }
}
