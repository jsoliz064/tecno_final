<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoPermisoLicencia;

class TipoPermisoLicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Permisos personal de 4 horas(1 vez al mes)';
        $tipo->tipo= 'Permiso';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Persmiso sin goze de haberes(maximo 3 meses)';
        $tipo->tipo= 'Permiso';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Permisos  de salud maximo 15 dias laborales';
        $tipo->tipo= 'Permiso';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Permisos  de salud maximo 15 dias laborales';
        $tipo->tipo= 'Permiso';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Permisos Ampliacion Salud';
        $tipo->tipo= 'Permiso';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Licencia con autorizacion escrita(Capacitacion)';
        $tipo->tipo= 'Licencia';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Licencia por matrimonio maximo 3 dias laborales';
        $tipo->tipo= 'Licencia';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Licencia por fallecimiento familiar 3 dias maximo';
        $tipo->tipo= 'Licencia';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Licencia por nacimiento de hijos 2 dias maximo';
        $tipo->tipo= 'Licencia';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Licencia por enfermedad o Invalidez';
        $tipo->tipo= 'Licencia';
        $tipo->save();

        $tipo = new TipoPermisoLicencia();
        $tipo->nombre = 'Licencia por asuntos Personales 2 dias Laborales';
        $tipo->tipo= 'Licencia';
        $tipo->save();

    }
}
