<?php

namespace App\Http\Controllers;

use App\Models\Tesis;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

class TesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $tesis = Tesis::all()->where("alumno",auth()->user()->name);
        $docentes = User::all()->where('role','admin');
        return view('tesis', compact('tesis', 'docentes'));
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
        $tesis = new Tesis();
        $tesis->titulo=$request->txtTitulo;
        $tesis->documentos = $request->txtCarpeta;
        $tesis->alumno = auth()->user()->name;
        $tesis->telefono = $request->txtTelefono;
        $tesis->asesor = $request->txtDocente_Asesor;
        $tesis->finicio= $request->txtFInicio;
        $tesis->jurado = 'Por Definirse';
        $tesis->sumilla = $request->txtSumilla;
        $tesis->estado = 'Por Aceptar';
        $tesis->save();
        return redirect('tesis')->with('status', 'Tesis Registrada');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function show(Tesis $tesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function edit(Tesis $tesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $tesis=Tesis::find($id);
        $tesis->observacion=$request->txtobservacion;
        $tesis->estado=$request->txtestado;
        $tesis->save();
        return redirect('/tesisasesor')->with('status','Tesis aceptada con éxito');
    }

    public function updatej($id,Request $request)
    {
        $tesis=Tesis::find($id);
        $tesis->link_sustentacion=$request->txtlink_sustentacion;
        $tesis->fsustentacion=$request->txtFSustentacion;
        $tesis->jurado=$request->auth()->user()->name;
        $tesis->save();
        return redirect('/judge')->with('status','Felicidades, usted ha calificado para Jurado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tesis $tesis)
    {
        //
    }
}
