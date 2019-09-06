<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

use App\Admin;
use App\Grupo;
use App\Carrera;
use App\Horario;
use App\User;
use App\Docente;
use App\Administrativo;
use App\Coordinador;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    //filtro para que solo la sesion de admin pueda ingresara las urls
    function __construct(){

        $this->middleware('auth:admins', ['only' => [
                           'secret',
                           'addAlumno',
                           'saveAlumno',
                           'verAlumnos',
                           'editarAlumno',
                           'actualizarAlumno',
                           'eliminarAlumno',
                           'addDocente',
                           'addAdministrativo',
                           'saveAdministrativo',
                           'addCoordinador',
                           'saveCoordinador']
        ]);

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

    public function verAlumnos(){

        $alumnos = User::paginate(6);

        return view('admin.verAlumnos')->with('alumnos', $alumnos);
    }

    public function addAlumno() {

        $grupos = Grupo::all();
        $carreras = Carrera::all();
        $horarios = Horario::all();

        return view('admin.añadirAlumno')->with('grupos',$grupos)
                                         ->with('carreras',$carreras)
                                         ->with('horarios',$horarios);
    }

    public function saveAlumno(Request $request) {
        //Aqui guardare el mensaje
        //generar nuevo alumno
        
        $alumno = new User;

        $validate = $this->validate($request, [
            'grupo'    => 'required',
            'carrera'  => 'required',
            'horario'  => 'required',
            'carnetEs' => 'required|unique:users,carnetEs',
            'cedulaEs' => 'required|unique:users,cedulaEs',
            'email'    => 'required|unique:users,email',
            
         ]);
        
        //Recoger data del formulario
        $grupo = (int)$request->get('grupo');
        $carrera = (int)$request->get('carrera');
        $horario = (int)$request->get('horario');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $carnet = $request->input('carnetEs');
        $cedula = $request->input('cedulaEs');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = bcrypt($password);
        $celular = $request->input('celular');
        $direccion = $request->input('direccion');

        $alumno->grupo_id = $grupo;
        $alumno->horario_id = $horario;
        $alumno->carrera_id = $carrera;
        $alumno->role = "alumno";
        $alumno->nombre = $nombre;
        $alumno->apellidos = $apellidos;
        $alumno->carnetEs = $carnet;
        $alumno->cedulaEs = $cedula;
        $alumno->email = $email;
        $alumno->password = $password;
        $alumno->celularEs = $celular;
        $alumno->direccionEs = $direccion;
        $alumno->estado = 1;

                      
        //Add to db
        
        $alumno->save();

            return redirect()->route('admin.añadirAlumno')
                     ->with(['message'=>'Usuario agregado correctamente.']);
       

        
    }

    public function editarAlumno(Request $request, $id) {
        
        $usuario = User::find($id);

        $grupos = Grupo::all();
        $carreras = Carrera::all();
        $horarios = Horario::all();


        return view('admin.editarAlumno')->with('grupos',$grupos)
                                         ->with('carreras',$carreras)
                                         ->with('horarios',$horarios)
                                         ->with('usuario', $usuario)
                                         ->with(['message'=>'Usuario actualizado exitosamente.']);
    }

    public function actualizarAlumno(Request $request, $id){

        $usuario = User::find($id);

        $grupo = (int)$request->get('grupo');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $carnet = $request->input('carnetEs');
        $cedula = $request->input('cedulaEs');
        $email = $request->input('email');
        $celular = $request->input('celular');
        $direccion = $request->input('direccion');

        $usuario->grupo_id  = $grupo;
        $usuario->nombre    = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->carnetEs  = $carnet;
        $usuario->cedulaEs  = $cedula;
        $usuario->email     = $email;
        $usuario->celularEs = $celular;
        $usuario->direccionEs = $direccion;

        $usuario->update();

        return redirect()->route('editar.alumno', $id)
                     ->with(['message'=>'Usuario actualizado correctamente.']);
    }

    

    public function eliminarAlumno(Request $request, $id) {

        $usuario = User::find($id);
        
        //borro las tareas paso el parametro asignado
        $usuario->tareas_entregadas($id)->delete();

        //borro los mensajes paso el parametro asignado
        $usuario->mensajes_enviados($id)->delete();

        $usuario->delete();

         return redirect()->route('ver.alumnos')
                     ->with(['message'=>'Alumno eliminado exitosamente']);
    }

    public function addDocente() {
        return view('admin.añadirDocente');
    }

    public function saveDocente(Request $request) {

        //generar nuevo alumno
        
        $docente = new Docente;

        $validate = $this->validate($request, [

            'email'    => 'required|unique:users,email',
            
         ]);
        
        //Recoger data del formulario
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = bcrypt($password);
        $celular = $request->input('celular');
        $direccion = $request->input('direccion');


        $docente->nombre = $nombre;
        $docente->apellidos = $apellidos;
        $docente->cedula = $cedula;
        $docente->email = $email;
        $docente->password = $password;
        $docente->celular = $celular;
        $docente->direccion = $direccion;
        $docente->estado = 1;
                      
        //Add to db
        
        $docente->save();

            return redirect()->route('admin.añadirDocente')
                     ->with(['message'=>'Docente agregado correctamente.']);      
    }

    public function addAdministrativo() {
        return view('admin.añadirAdministrativo');
    }

    public function saveAdministrativo(Request $request) {

        //generar nuevo alumno
        
        $administrativo = new Administrativo;

        $validate = $this->validate($request, [

            'email'    => 'required|unique:users,email',
            
         ]);
        
        //Recoger data del formulario
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = bcrypt($password);


        $administrativo->nombre = $nombre;
        $administrativo->apellidos = $apellidos;
        $administrativo->email = $email;
        $administrativo->password = $password;

        $administrativo->save();

            return redirect()->route('admin.añadirAdministrativo')
                     ->with(['message'=>'Administrativo agregado correctamente.']);
    }

    public function addCoordinador() {
        $carreras = Carrera::all();

        return view('admin.añadirCoordinador')->with('carreras',$carreras);
    }

    public function saveCoordinador(Request $request) {



        $coordinador = new Coordinador;

        $validate = $this->validate($request, [

            'email'    => 'required|unique:users,email',
            
         ]);

        //Recoger data del formulario
        $carrera = (int)$request->get('carrera');

        
        //Recoger data del formulario
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = bcrypt($password);

        $coordinador->carrera_id = $carrera;
        $coordinador->nombre = $nombre;
        $coordinador->apellidos = $apellidos;
        $coordinador->email = $email;
        $coordinador->password = $password;

        $coordinador->save();

        return redirect()->route('admin.añadirCoordinador')
                     ->with(['message'=>'Coordinador agregado correctamente.']);
    }
}
