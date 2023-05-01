<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Producto;
use App\Models\Categoria;

class ProductosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=Categoria::create( ['tipo'=>'juguete']);
        Producto::create(['categoria_id'=>$cat->id,'nombre'=>'Set de construcción','precio'=>20,'cantidad'=>50,'descripcion'=>'Gran colección, pack conmemorativo']);
    }
}
