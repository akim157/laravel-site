<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sliders')->insert([
            [
                'img'   => 'xx.jpg',
                'desc'  => '<h2 style="color:#fff">CORPORATE, MULTIPURPOSE.. <br /><span>PINK RIO</span></h2>',
                'title' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque'
            ],
            [
                'img'   => '00314.jpg',
                'desc'  => '<h2 style="color:#fff">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>',
                'title' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque'
            ],
            [
                'img'   => 'dd.jpg',
                'desc'  => '<h2 style="color:#fff">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>',
                'title' => 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque'
            ]
        ]);
    }
}
