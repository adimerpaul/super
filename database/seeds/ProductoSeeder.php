<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert(['nombre'=>'pizza mexicana','estado'=>'New','estrella'=>'5','precio1'=>'50','precio2'=>'70','corazon'=>'NO','categoria_id'=>1,'user_id'=>1]);
        DB::table('productos')->insert(['nombre'=>'pizza doble','estado'=>'Sold','estrella'=>'4','precio1'=>'65','precio2'=>'','corazon'=>'SI','categoria_id'=>1,'user_id'=>1]);
        DB::table('productos')->insert(['nombre'=>'pizza triple','estado'=>'Offer','estrella'=>'1','precio1'=>'60','precio2'=>'80','corazon'=>'NO','categoria_id'=>1,'user_id'=>1]);
        DB::table('productos')->insert(['nombre'=>'pizza cuatrile','estado'=>'','estrella'=>'3','precio1'=>'70','precio2'=>'92','corazon'=>'SI','categoria_id'=>1,'user_id'=>1]);
        DB::table('productos')->insert(['nombre'=>'jugo de platano','estado'=>'','estrella'=>'4','precio1'=>'5','precio2'=>'','corazon'=>'SI','categoria_id'=>3,'user_id'=>1]);
        DB::table('productos')->insert(['nombre'=>'jugo de frutilla','estado'=>'','estrella'=>'4','precio1'=>'5','precio2'=>'','corazon'=>'SI','categoria_id'=>3,'user_id'=>1]);
    }
}
