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
    protected $fillable = ['idProducto','idCompra'];
    public function producto(){
        return $this->belongsTo(Producto::class, 'idProducto');
    }
    public function compra(){
        return $this->belongsTo(Compra::class, 'idCompra');
    }
}
