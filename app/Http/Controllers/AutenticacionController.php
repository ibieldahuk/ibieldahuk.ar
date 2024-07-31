<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller
{
	public function mostrarFormularioDeRegistro()
	{
		return view('registro');
	}

	public function registrar(Request $peticion)
	{
		$peticion->validate([
			'nombre' => 'required|string|max:255',
			'correo' => 'required|string|email|max:255|unique:users',
			'clave' => 'required|string|min:8|confirmed',
		]);

		$user = User::create([
			'name' => $request->nombre,
			'email' => $request->correo,
			'password' => Hash::make($request->clave),
		]);

		return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor, inicie sesión.');
	}

	public function iniciarSesion(Request $peticion)
	{
	    $credenciales = $peticion->only('correo', 'clave');

	    if (Auth::attempt($credenciales)) {
	        return redirect()->intended('dashboard'); // Redirect to the intended page or dashboard
	    }

    	return back()->withErrors([
        	'correo' => 'Los datos ingresados no se corresponden con un usuario existente.',
    	]);
	}

	public function cerrarSesion()
	{
	    Auth::logout();
	    return redirect()->route('iniciarSesion')->with('success', 'La sesión se cerró correctamente.');
	}

}

