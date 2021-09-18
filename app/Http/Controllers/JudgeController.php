<?php

namespace App\Http\Controllers;

use App\Models\Tesis;
use Illuminate\Http\Request;

class JudgeController extends Controller
{
    public function index (){
        $tesis=Tesis::all()->where('estado','!=','Por Aceptar');
        return view('judge.index',compact('tesis'));
    }
}
