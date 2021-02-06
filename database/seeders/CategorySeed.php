<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array(
                'name' => "Cleaning",
            ),
            array(
                'name' => "Construction",
            ),
            array(
                'name' => "Transport"

            ),

        ));
    }
}
