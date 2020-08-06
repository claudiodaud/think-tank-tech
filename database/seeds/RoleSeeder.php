<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create([
        'name' 			=> 'Admin',
        'slug' 			=> 'admin',
        'description'	=> 'acceso total',
        ]);
        Role::create([
        'name' 			=> 'Supervisor',
        'slug' 			=> 'supervisor',
        'description'	=> 'acceso a editar todo menos eliminar',
        ]);
        Role::create([
        'name' 			=> 'Moderator',
        'slug' 			=> 'moderator',
        'description'	=> 'acceso a editar, y eliminar las publicaciones y articulos de todos ',
        ]);
        Role::create([
        'name' 			=> 'Writerr',
        'slug' 			=> 'writer',
        'description'	=> 'acceso a crear editar y eliminar sus publicaciones y articulos ',
        ]);
        Role::create([
        'name' 			=> 'User',
        'slug' 			=> 'user',
        'description'	=> 'acceso a una parte de la informacion',
        ]);
        Role::create([
        'name' 			=> 'Premium',
        'slug' 			=> 'premium',
        'description'	=> 'acceso a gran parte de la info',
        ]);
         Role::create([
        'name' 			=> 'Vip',
        'slug' 			=> 'vip',
        'description'	=> 'acceso a toda la info',
        ]);
    }
}
