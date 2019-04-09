<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert([
            [
                'title' => 'Главная',
                'path'  => 'http://corporate.loc'
            ],
            [
                'title' => 'Блог',
                'path'  => 'http://corporate.loc/articles'
            ],
            [
                'title' => 'Компьютеры',
                'path'  => 'http://corporate.loc/articles/cat/computers'
            ],
            [
                'title' => 'Интересное',
                'path'  => 'http://corporate.loc/articles/cat/iteresting'
            ],
            [
                'title' => 'Советы',
                'path'  => 'http://corporate.loc/articles/cat/soveti'
            ],
            [
                'title' => 'Портфолио',
                'path'  => 'http://corporate.loc/portfolios'
            ],
            [
                'title' => 'Контакты',
                'path'  => 'http://corporate.loc/contacts'
            ]
        ]);
    }
}
