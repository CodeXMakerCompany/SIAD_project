<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Administrativo;
use Auth;

class AdministrativoController extends Controller
{	

	use AuthenticatesUsers;

	//filtro y recuperar la variable de usuario autentificado
	function __construct(){

		$this->middleware('auth:administrativos', ['only' => ['secret']]);

	}

	protected function guard()
    {
        return Auth::guard('administrativos');
    }

    public function showLoginForm()
    {	
        return view('administrativo.login'); //Lugar donde esta el Login de administradores
    }

    public function authenticated(){

    	return redirect('administrativo/area');
    
    }

    public function secret() {
        

    	return view('administrativo.dashboard');
    	//'Hola ' .auth('admins')->user()->email;

    }



}
