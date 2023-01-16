<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoPersonal;

class TipoPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPersonal::create([
            'nombre'=>"Administrativo"
        ]);
        TipoPersonal::create([
            'nombre'=>"Docente"
        ]);
    }
}
