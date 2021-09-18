<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PracticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicas=Practica::all();
        return view('practicas',compact('practicas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function show(Practica $practica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) //Admin
    {
        $practica=Practica::find($id);
        // $practica->nota=$request->txtnota;
        $practica->observacion=$request->txtobservacion;
        $practica->estado=$request->txtestado;
        $practica->save();
        return redirect('/practices')->with('status','Práctica Calificada');;
    }

    public function updateu(Request $request) { //user
        $id = $request->id;
        $practica=Practica::find($id);
        $practica->informe=$request->txtinforme;
        $practica->comentario=$request->txtcomentario;
        $practica->estado='Pendiente Corrección';
        $practica->save();
        return redirect('/practica')->with('status','Práctica Enviada');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practica  $practica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practica $practica)
    {
        //
    }

    public function topdf($id) {
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("ejemplo", [
        "item" => Practica::find($id),
        ]);
        return $dompdf->stream();
    }

}
