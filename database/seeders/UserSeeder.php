<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'=> 'administrador',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Administrador');

        $user2 = User::create([
            'name'=> 'Jefe RRHH',
            'email'=> 'jefe@gmail.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Jefe');

        $user3 = User::create([
            'name'=> 'Secretaria',
            'email'=> 'secretaria@gmail.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Secretaria');

        $user3 = User::create([
            'name'=> 'pasante',
            'email'=> 'pasante@gmail.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Pasante');

       
    }
}
