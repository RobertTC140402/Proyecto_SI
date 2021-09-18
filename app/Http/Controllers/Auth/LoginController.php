<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function login(Request $request,Redirector $redirect) {
        $credentials = $request->validate(['email'=>['required','email','string'],'password'=>['required','string']]);
        $remember = $request->filled('remember');
        if (Auth::attempt($request->only('email','password'),$remember)) {
            $request->session()->regenerate();
            if(auth()->user()->role=='admin') {
                return redirect()->route('admin.index')->with('status','Modo Administrador');
            } else if (auth()->user()->role=='judge'){
                return redirect()->route('judge.index')->with('status','Bienvenido Jurado');
            } 
            else {
                return redirect()->route('preinscripcion.index')->with('status','Sesión Iniciada');
            } 
        } 
        throw ValidationException::withMessages(['email'=>__('auth.failed')]);
    }

    public function logout(Request $request,Redirector $redirect) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/')->with('status',"Sesión Finalizada");
    }

}
