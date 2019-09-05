<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Docente;
use Auth;

class DocenteController extends Controller
{	

	use AuthenticatesUsers;

	protected function guard()
    {
        return Auth::guard('docentes');
    }


   public function showLoginForm()
    {	
        return view('docente.login'); //Lugar donde esta el Login de administradores
    }

    public function authenticated(){

    	return redirect('docente/area');
    
    }

    public function secret() {

    	return view('docente.dashboard');
    	//'Hola ' .auth('admins')->user()->email;

    }
}
