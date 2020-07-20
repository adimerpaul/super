<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combos')->insert(['nombre'=>'Combo 1','estado'=>'New','estrella'=>'4','precio1'=>'65','precio2'=>'60','corazon'=>'si']);

    }
}
