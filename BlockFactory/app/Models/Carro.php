<?php

namespace App\Models;
use App\Models\User;
use App\Models\LineaCarro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['idCliente'];
    public function cliente(){
        return $this->belongsTo(User::class, 'idCliente');
    }
    public function lineasCarrito(){
        return $this->hasMany(LineaCarro::class);
    }
}
