<?php

namespace Paneladministration\PanelAdministration;

use Illuminate\Database\Seeder;
use Menu;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        Menu::firstOrCreate([
            'titre_menus' => 'admin',
        ]);
    }
}
