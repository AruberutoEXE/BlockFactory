<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','surname','direction','email_adress'];
    use HasFactory;
}
