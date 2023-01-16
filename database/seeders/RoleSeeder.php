<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Jefe']);
        $role3 = Role::create(['name' => 'Secretaria']);
        $role4 = Role::create(['name' => 'Pasante']);

        Permission::create(['name'=>'roles'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name'=>'permisos'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'users.index'])   ->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'users.show'])  ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'users.create'])  ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'users.edit'])    ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'users.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'contratos.index'])   ->syncRoles([$role1, $role2, $role3,$role4]);
        Permission::create(['name'=>'contratos.show'])   ->syncRoles([$role1, $role2, $role3,$role4]);
        Permission::create(['name'=>'contratos.create'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'contratos.edit'])    ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'contratos.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'personal.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'personal.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'personal.create'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'personal.edit'])    ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'personal.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'archivos.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'archivos.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'archivos.create'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'archivos.edit'])    ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'archivos.destroy']) ->syncRoles([$role1, $role2,$role3]);

        Permission::create(['name'=>'horarios.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'horarios.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'horarios.create'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'horarios.edit'])    ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'horarios.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'asistencias.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'asistencias.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'asistencias.create'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'asistencias.edit'])    ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'asistencias.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'evaluacion.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'evaluacion.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'evaluacion.create'])  ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'evaluacion.edit'])    ->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name'=>'evaluacion.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'certificados.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'certificados.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'certificados.create'])  ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'certificados.edit'])    ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'certificados.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'permisos.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'permisos.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'permisos.create'])  ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'permisos.edit'])    ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'permisos.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'tipo_permiso.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'tipo_permiso.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'tipo_permiso.create'])  ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tipo_permiso.edit'])    ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tipo_permiso.destroy']) ->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'vacaciones.index'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'vacaciones.show'])   ->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=>'vacaciones.create'])  ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'vacaciones.edit'])    ->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'vacaciones.destroy']) ->syncRoles([$role1, $role2]);

    }
}
