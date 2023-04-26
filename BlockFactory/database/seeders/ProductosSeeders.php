<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Productos')->insert(['categoria_id'=> Str::random(10),'nombre'=> Str::random(10),'precio'=>20,'cantidad'=>200,'descripcion'=> Str::random(10)]);
        DB::table('Productos')->insert(['categoria_id'=> Str::random(10),'nombre'=> Str::random(10),'precio'=>20,'cantidad'=>200,'descripcion'=> Str::random(10)]);
        DB::table('Productos')->insert(['categoria_id'=> Str::random(10),'nombre'=> Str::random(10),'precio'=>20,'cantidad'=>200,'descripcion'=> Str::random(10)]);
        DB::table('Productos')->insert(['categoria_id'=> Str::random(10),'nombre'=> Str::random(10),'precio'=>20,'cantidad'=>200,'descripcion'=> Str::random(10)]);
        DB::table('Productos')->insert(['categoria_id'=> Str::random(10),'nombre'=> Str::random(10),'precio'=>20,'cantidad'=>200,'descripcion'=> Str::random(10)]);
    }
}
