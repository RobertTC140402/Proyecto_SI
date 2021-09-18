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
        $tesis = Tesis::all();
        $docentes = User::all()->where('role','admin');
        $jurados = User::all()->where('role','judge');
        return view('tesis', compact('tesis', 'docentes','jurados'));

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
    {;
        $tesis = new Tesis();
        $tesis->titulo=$request->txtTitulo;
        $tesis->documentos = $request->txtDocumentos;
        $tesis->alumno = $request->txtAlumno;
        $tesis->docente = $request->txtDocente;
        $tesis->jurado = $request->txtJurado;
        $tesis->fsustentacion= $request->txtFechaInicio;
        $tesis->comentario = $request->txtComentario;
        $tesis->estado = 'Por Revisar';
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
    public function update(Request $request, Tesis $tesis)
    {
        //
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
