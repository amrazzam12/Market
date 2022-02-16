<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Parent',
                'slug' => 'The Main Category',
                'photo' => null ,
                'status' => 'inactive',
                'parent_id' => '1'
            ]
        ]);
    }
}
