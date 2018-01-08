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

        $role_member = Role::where('name', 'member')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Harry Ermawan';
        $user->email = 'admin@gmail.com';
        $user->dob = '1997-10-20';
        $user->password = bcrypt('admin123');
        $user->pp = 'users/art.jpg';
        $user->role = 'admin';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Andre';
        $user->email = 'member@gmail.com';
        $user->dob = '1997-04-13';
        $user->password = bcrypt('member123');
        $user->pp = 'users/bepo.jpg';
        $user->role = 'member';
        $user->save();
        $user->roles()->attach($role_member);



    }
}
