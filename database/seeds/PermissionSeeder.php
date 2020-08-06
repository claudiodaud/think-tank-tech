<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User..........>
        Permission::create([
        'name' 			=> 'Navegar usuarios',
        'slug' 			=> 'users.index',
        'description'	=> 'puede ver y navegar por el modulo de usuarios',
        ]);
         Permission::create([
        'name' 			=> 'Crear usuarios',
        'slug' 			=> 'users.create',
        'description'	=> 'puede crear usuarios',
        ]);
         Permission::create([
        'name' 			=> 'Guardar usuarios',
        'slug' 			=> 'users.store',
        'description'	=> 'puede guardar usuarios',
        ]);
        Permission::create([
        'name' 			=> 'Ver usuarios',
        'slug' 			=> 'users.show',
        'description'	=> 'puede ver el detalle de un usuario',
        ]);
        Permission::create([
        'name' 			=> 'Editar usuarios',
        'slug' 			=> 'users.edit',
        'description'	=> 'puede editar la informacion de un usuario',
        ]);
         Permission::create([
        'name' 			=> 'Actualizar usuarios',
        'slug' 			=> 'roles.update',
        'description'	=> 'puede actualizar la informacion de un usuario',
        ]);
        Permission::create([
        'name' 			=> 'Eliminar usuarios',
        'slug' 			=> 'users.destroy',
        'description'	=> 'puede eliminar un usuarios',
        ]);

        //roles..........>
        Permission::create([
        'name' 			=> 'Navegar roles',
        'slug' 			=> 'roles.index',
        'description'	=> 'puede ver y navegar por el modulo de roles',
        ]);
        Permission::create([
        'name' 			=> 'Crear roles',
        'slug' 			=> 'roles.create',
        'description'	=> 'puede crear roles',
        ]);
        Permission::create([
        'name' 			=> 'Guardar roles',
        'slug' 			=> 'roles.store',
        'description'	=> 'puede guardar roles',
        ]);
        Permission::create([
        'name' 			=> 'Ver roles',
        'slug' 			=> 'roles.show',
        'description'	=> 'puede ver el detalle de un rol',
        ]);
        Permission::create([
        'name' 			=> 'Editar roles',
        'slug' 			=> 'roles.edit',
        'description'	=> 'puede editar la informacion de un rol',
        ]);
         Permission::create([
        'name' 			=> 'Actualizar roles',
        'slug' 			=> 'roles.update',
        'description'	=> 'puede actualizar la informacion de un rol',
        ]);
        Permission::create([
        'name' 			=> 'Eliminar roles',
        'slug' 			=> 'roles.destroy',
        'description'	=> 'puede eliminar un roles',
        ]);

        //Permisions..........>
        Permission::create([
        'name' 			=> 'Navegar permisos',
        'slug' 			=> 'permissions.index',
        'description'	=> 'puede ver y navegar por el modulo de permisos',
        ]);
         Permission::create([
        'name' 			=> 'Crear permisos',
        'slug' 			=> 'permissions.create',
        'description'	=> 'puede crear permisos',
        ]);
        Permission::create([
        'name' 			=> 'Guardar permisos',
        'slug' 			=> 'permissions.store',
        'description'	=> 'puede guardar permisos',
        ]); 
        Permission::create([
        'name' 			=> 'Ver permisos',
        'slug' 			=> 'permissions.show',
        'description'	=> 'puede ver el detalle de un permiso',
        ]);
        Permission::create([
        'name' 			=> 'Editar permisos',
        'slug' 			=> 'permissions.edit',
        'description'	=> 'puede editar la informacion de un permiso',
        ]);
         Permission::create([
        'name' 			=> 'Actualizar permisos',
        'slug' 			=> 'permissions.update',
        'description'	=> 'puede actualizar la informacion de un permiso',
        ]);
        Permission::create([
        'name' 			=> 'Eliminar permisos',
        'slug' 			=> 'permissions.destroy',
        'description'	=> 'puede eliminar un permisos',
        ]);
    }
}
