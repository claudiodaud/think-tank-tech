<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(User::class,10)->create();
        
        User::create([
        	'name'		=>'Admin',
        	'email'		=>'admin@admin.com',
        	'password'	=>bcrypt('password'),	
        ]);
         User::create([
            'name'      =>'Supervisor',
            'email'     =>'supervisor@admin.com',
            'password'  =>bcrypt('password'),   
        ]);
          User::create([
            'name'      =>'Moderator',
            'email'     =>'moderator@admin.com',
            'password'  =>bcrypt('password'),   
        ]); 
          User::create([
            'name'      =>'Writer',
            'email'     =>'writer@admin.com',
            'password'  =>bcrypt('password'),   
        ]);  
          User::create([
            'name'      =>'User',
            'email'     =>'user@admin.com',
            'password'  =>bcrypt('password'),   
        ]); 
          User::create([
            'name'      =>'Premium',
            'email'     =>'premium@admin.com',
            'password'  =>bcrypt('password'),   
        ]);  
          User::create([
            'name'      =>'Vip',
            'email'     =>'vip@admin.com',
            'password'  =>bcrypt('password'),   
        ]);  
    }
}
