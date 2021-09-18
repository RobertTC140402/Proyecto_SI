<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Practica;

class Preinscripcion extends Model
{
    public $table = 'preinscripciones';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;

    use HasFactory;

    public function practicas() {
        return $this->hasMany(Practica::class,'id','idpreinscripcion');
    }
}
