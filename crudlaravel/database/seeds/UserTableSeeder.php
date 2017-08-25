<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usr = new User;
        $usr->name = 'Jeremias Springfield';
        $usr->email = 'jeremias@gmail.com';
        $usr->password = bcrypt('admin');
        $usr->role = 'Admin';
        $usr->photo = 'photos/jeremias.png';
        $usr->save();

        User::create(array(
        	'name'     => 'Homero Simpson',
        	'email'    => 'homero@gmail.com',
        	'password' => bcrypt('customer'),
        	'role'     => 'Customer',
        	'photo'    => 'photos/homero.png',
        ));
        // Se crean 50 Usuarios con Factory
        factory(User::class, 50)->create();
    }
}
