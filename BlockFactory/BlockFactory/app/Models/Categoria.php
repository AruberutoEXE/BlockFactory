<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    static $rules = [
        'tipo' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['tipo'];


    public function productos()
    {
        return $this->belongsTo('App\Models\Producto', 'categoria_id', 'tipo');
    }

    

}
