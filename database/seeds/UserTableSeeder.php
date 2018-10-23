<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('role_user')->truncate();

        $user = User::create([
            'name' => 'Guido',
            'email' => 'guido@mail.com',
            'password' => bcrypt('hola123')
        ]);

        $role = Role::create([
            'key' => 'admin',
            'name' => 'Administrador',
            'description' => 'Administrador del sitio web'
        ]);

        $user->roles()->save($role);

    }
}
