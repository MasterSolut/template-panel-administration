<?php

namespace Paneladministration\PanelAdministration;

use Illuminate\Database\Seeder;
use Paneladministration\PanelAdministration\Models\TypeUser;

class TypeUserSeeder extends Seeder
{
    public function run()
    {
        TypeUser::firstOrCreate([
            'libelle_type_users' => '',
            'fixe' => '',
        ]);
    }
}
