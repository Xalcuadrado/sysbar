<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(sysbar\User::class, 5)->create();

        Role::create([
        	'name'         => 'Administrador-SBAR',
            'description'  => 'Administrador todo poderoso',
        	'slug'         => 'adminrabs',
        	'special'      => 'all-access'
        ]);
        Role::create([
            'name'         => 'Administrador',
            'description'  => 'Administrador con provilegios de empresa',
            'slug'         => 'adm-empresa-diablito'
        ]);
        Role::create([
            'name'         => 'Standard',
            'description'  => 'Usuario registrado para interactuar con el sistema de pedidos',
            'slug'         => 'normal'
        ]);
    }
}
