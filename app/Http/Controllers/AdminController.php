<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    

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

    	return 'Hola ' .auth('admins')->user()->email;

    }
}
