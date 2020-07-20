<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombocategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combocategorias')->insert(['nombre'=>'Jugos','cantidad'=>1,'combo_id'=>1]);
        DB::table('combocategorias')->insert(['nombre'=>'Hamburguesas','cantidad'=>2,'combo_id'=>1]);
    }
}
