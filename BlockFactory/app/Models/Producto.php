<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['name','price','amount','email_adress','aditional_features'];
}
