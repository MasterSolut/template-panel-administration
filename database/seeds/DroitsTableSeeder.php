<?php

namespace Paneladministration\PanelAdministration;

use Paneladministration\PanelAdministration\Models\Droit;
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
