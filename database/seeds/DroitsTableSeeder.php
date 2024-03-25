<?php

namespace Paneladministration\PanelAdministration;

use Illuminate\Database\Seeder;
use Paneladministration\PanelAdministration\Models\Droit;

class DroitsTableSeeder extends Seeder
{
    public function run()
    {
        Droit::firstOrCreate([
            'publier_droits' => true,
        ]);
    }
}
