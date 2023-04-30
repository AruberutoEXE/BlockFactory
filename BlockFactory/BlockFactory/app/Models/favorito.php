<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\User;

class favorito extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['producto_id','user_id'];
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    public function compra(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
