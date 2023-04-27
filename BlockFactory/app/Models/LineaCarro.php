<?php

namespace App\Models;
use App\Models\Producto;
use App\Models\Carro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaCarro extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['producto_id','carro_id'];
    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
    public function carro(){
        return $this->belongsTo(Carro::class);
    }
}
