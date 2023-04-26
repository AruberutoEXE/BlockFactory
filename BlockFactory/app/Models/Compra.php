<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['idCliente'];
    public function cliente(){
        return $this->belongsTo(User::class, 'idCliente');
    }
}
