<?php

namespace App\Models;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaCompra extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['producto_id','compra_id'];
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
}
