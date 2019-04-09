<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('filters')->insert([
            [
                'title' => 'Brand Identity',
                'alias' => 'brand-identity'
            ]
        ]);
    }
}
