<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Practica;
use App\Models\User;

class PreinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preinscripciones=Preinscripcion::all();
        $docentes=User::all()->where('role','admin');
        //$docentes=User::all();
        return view('dashboard',compact('preinscripciones'),compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preinscripcion=new Preinscripcion();
        $preinscripcion->alumno=auth()->user()->name;
        // $preinscripcion->codigo='4444';
        $preinscripcion->docente=$request->txtdocente;
        $preinscripcion->organizacion=$request->txtorganizacion;
        $preinscripcion->rubro=$request->txtrubro;
        $preinscripcion->supervisor=$request->txtsupervisor;
        $preinscripcion->cargo=$request->txtcargo;
        $preinscripcion->telefono=$request->txttelefono;
        $preinscripcion->email=$request->txtcorreo;
        $preinscripcion->fenvio=Carbon::now();
        $preinscripcion->finicio=$request->txtfinicio;
        $preinscripcion->ftermino=$request->txtftermino;
        $preinscripcion->horas=$request->txthoras;
        $preinscripcion->descripcion=$request->txtdescripcion;
        $preinscripcion->estado='Pendiente';
        $preinscripcion->save();
        return redirect('preinscripcion')->with('status','Preinscripción Enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Preinscripcion $preinscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Preinscripcion $preinscripcion)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $preinscripcion=Preinscripcion::find($id);
        $preinscripcion->observacion=$request->txtobservacion;
        $preinscripcion->estado=$request->txtestado;
        if ($preinscripcion->estado=='Aceptada') {
            $practica=new Practica();
            // $practica->corrector=auth()->user()->name;
            $practica->informe=1;
            // $practica->nota=0;
            $practica->idpreinscripcion=$preinscripcion->id;
            $practica->estado='Pendiente Envío';
            $practica->save();
        }
        $preinscripcion->save();
        return redirect('/admin')->with('status','Preinscripción Resuelta');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preinscripcion  $preinscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preinscripcion $preinscripcion)
    {
        //
    }
}
