<?php

use Illuminate\Database\Seeder;

class ComboproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comboproductos')->insert(['producto_id'=>1,'combocategoria_id'=>1]);
        DB::table('comboproductos')->insert(['producto_id'=>5,'combocategoria_id'=>1]);
        DB::table('comboproductos')->insert(['producto_id'=>6,'combocategoria_id'=>1]);
    }
}
