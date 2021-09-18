<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preinscripcion;

class Practica extends Model
{
    public $table = 'practicas';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;
    
    use HasFactory;

    public function preinscripcion() {
        return $this->hasOne(Preinscripcion::class,'id','idpreinscripcion');
    }
}
