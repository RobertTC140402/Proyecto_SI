<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    use HasFactory;
    public $table = 'tesis';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;
    
}
