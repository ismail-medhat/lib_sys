<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Insert Data Into users table */
        DB::table('users')->insert([
            'role_id'  => '1',
            'name'     => 'Admin',
            'username' => 'Ismail',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id'  => '2',
            'name'     => 'Author',
            'username' => 'medhat',
            'email'    => 'author@gmail.com',
            'password' => bcrypt('rootauthor'),
        ]);
    }
}
