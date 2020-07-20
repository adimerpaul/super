<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre'=>'Pizzass','icono'=>'far fa-list-alt']);
        DB::table('categorias')->insert(['nombre'=>'Hamburguesas','icono'=>'far fa-play-circle']);
        DB::table('categorias')->insert(['nombre'=>'Jugos','icono'=>'fas fa-wine-glass']);
        DB::table('categorias')->insert(['nombre'=>'Almuerzos','icono'=>'fas fa-utensils']);
    }
}
