<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    static $rules = [
		'categoria_id' => 'required',
		'nombre' => 'required',
        'precio' => 'required',
        'cantidad' => 'required',
        'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','nombre','precio','cantidad','descripcion','fav'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'tipo', 'categoria_id');
    }
}
