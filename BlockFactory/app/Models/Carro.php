<?php

namespace App\Models;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['idCliente'];
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
