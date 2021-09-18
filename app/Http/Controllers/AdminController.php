<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preinscripcion;
use App\Models\Practica;
use App\Models\Tesis;

class AdminController extends Controller
{
    public function index() {
        $preinscripciones=Preinscripcion::all()->where('docente',auth()->user()->name);
        return view('admin.index',compact('preinscripciones'));
    }
    public function practices() {
        $practicas=Practica::all()->where('preinscripcion.docente',auth()->user()->name);
        return view('admin.practicas',compact('practicas'));
    }
    public function stats() {
        return view('admin.estadisticas');
    }
    public function tesis(){
        $tesis=Tesis::all()->where('asesor',auth()->user()->name);
        return view('admin.tesis',compact('tesis'));
    }
}
