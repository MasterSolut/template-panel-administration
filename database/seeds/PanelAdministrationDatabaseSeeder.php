<?php

use Illuminate\Database\Seeder;
use Paneladministration\PanelAdministration\DroitsTableSeeder;
use Paneladministration\PanelAdministration\MenusTableSeeder;
use Paneladministration\PanelAdministration\TypeUserSeeder;

class VoyagerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenusTableSeeder::class,
            DroitsTableSeeder::class,
            TypeUserSeeder::class
        ]);
    }
}
