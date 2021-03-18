<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // call database seeder .....
         $this->call([UsersTableSeeder::class,
                      RolesTableSeeder::class,
                      BookTableSeeder::class]);

    }
}
