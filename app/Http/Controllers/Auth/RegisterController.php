<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Grupo;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/completar';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'carnetEs' => 'required|string|max:255',
            'cedulaEs' => 'required|string|max:255',
            'celularEs' => 'required|string|max:255',
            'direccionEs' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'grupo_id' => '3',
            'horario_id' => '1',
            'carrera_id' => '1',
            'role' => 'alumno',
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'carnetEs' => $data['carnetEs'],
            'cedulaEs' => $data['cedulaEs'],
            'celularEs' => $data['celularEs'],
            'direccionEs' => $data['direccionEs'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
