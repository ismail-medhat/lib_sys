<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Insert Data Into Book table */
        DB::table('books')->insert([
            'name'     => 'book1',
            'author_name' => 'khaled',
            'edition_number'    => '1',
            'isborrow' => '0',
        ]);

        DB::table('books')->insert([
            'name'     => 'book2',
            'author_name' => 'ahmed',
            'edition_number'    => '1',
            'isborrow' => '0',
        ]);

        DB::table('books')->insert([
            'name'     => 'book3',
            'author_name' => 'ibrahim',
            'edition_number'    => '1',
            'isborrow' => '0',
        ]);

        DB::table('books')->insert([
            'name'     => 'book4',
            'author_name' => 'elsayed',
            'edition_number'    => '1',
            'isborrow' => '0',
        ]);
    }

}
