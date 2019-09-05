<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    //filtro para que solo la sesion de admin pueda ingresara las urls
    function __construct(){

        $this->middleware('auth:admins', ['only' => ['secret']]);

    }

    protected function guard()
    {
        return Auth::guard('admins');
    }

    public function showLoginForm()
    {	
        return view('admin.login'); //Lugar donde esta el Login de administradores
    }

    public function authenticated(){

    	return redirect('admin/area');
    
    }

    public function secret() {

    	return view('admin.dashboard');
    	//'Hola ' .auth('admins')->user()->email;

    }
}
