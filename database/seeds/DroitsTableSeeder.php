<?php

namespace Paneladministration\PanelAdministration;

use Droit;
use Illuminate\Database\Seeder;

class DroitsTableSeeder extends Seeder
{
    public function run()
    {
        Droit::firstOrCreate([
            'publier_droits' => true,
        ]);
    }
}
