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
use App\PublicacionAdm;

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
                           'verDocentes',
                           'editarDocente',
                           'actualizarDocente',
                           'eliminarDocente',
                           'addAdministrativo',
                           'saveAdministrativo',
                           'verAdministrativos',
                           'editarAdministrativo',
                           'actualizarAdministrativo',
                           'eliminarAdministrativo',
                           'addCoordinador',
                           'saveCoordinador',
                           'verCoordinador',
                           'editarCoordinador',
                           'actualizarCoordinador',
                           'eliminarCoordinador']
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

        $users = User::all();
        $users = count($users);

        $docentes = Docente::all();
        $docentes = count($docentes);

        $administrativos = Administrativo::all();
        $administrativos = count($administrativos);

        $coordinadores = Coordinador::all();
        $coordinadores = count($coordinadores);

        $mensajes = PublicacionAdm::orderBy('id','DESC')->paginate(10);


    	return view('admin.dashboard')->with('users', $users)
                                      ->with('docentes', $docentes)
                                      ->with('administrativos', $administrativos)
                                      ->with('coordinadores', $coordinadores)
                                      ->with('mensajes', $mensajes);
    	//'Hola ' .auth('admins')->user()->email;

    }

    public function verAlumnos(){

        $alumnos = User::orderBy('id', 'DESC')->paginate(6);

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

    public function verDocentes(){


        $docentes = Docente::orderBy('id', 'DESC')->paginate(6);

        return view('docente.verDocentes')->with('docentes', $docentes);
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

    public function editarDocente(Request $request, $id) {
        
        $docente = Docente::find($id);


        return view('docente.editarDocente')->with('docente',$docente)
                                            ->with(['message'=>'Usuario actualizado exitosamente.']);
    }

    public function actualizarDocente(Request $request, $id){


        $docente = Docente::find($id);

        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedulaEs');
        $email = $request->input('email');
        $celular = $request->input('celular');
        $direccion = $request->input('direccion');


        $docente->nombre    = $nombre;
        $docente->apellidos = $apellidos;
        $docente->cedula  = $cedula;
        $docente->email     = $email;
        $docente->celular = $celular;
        $docente->direccion = $direccion;

        $docente->update();

        return redirect()->route('editar.docente', $id)
                     ->with(['message'=>'Docente actualizado correctamente.']);
    }

    public function eliminarDocente(Request $request, $id) {

        $docente = Docente::find($id);

        $docente->delete();

         return redirect()->route('ver.docentes')
                     ->with(['message'=>'Docente eliminado exitosamente']);
    }

    public function verAdministrativos(){

        $administrativosA = Administrativo::orderBy('id', 'DESC')->paginate(6);

        return view('administrativo.verAdministrativos')->with('administrativosA' , $administrativosA);
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

    public function editarAdministrativo(Request $request, $id) {
        
        $administrativo = Administrativo::find($id);

        return view('administrativo.editarAdministrativo')->with('administrativo',$administrativo)
                                         ->with(['message'=>'Usuario actualizado exitosamente.']);
    }

    public function actualizarAdministrativo(Request $request, $id){


        $administrativo = Administrativo::find($id);

        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');


        $administrativo->nombre    = $nombre;
        $administrativo->apellidos = $apellidos;
        $administrativo->email     = $email;

        $administrativo->update();

        return redirect()->route('editar.administrativo', $id)
                     ->with(['message'=>'Administrativo actualizado correctamente.']);
    }

    public function eliminarAdministrativo(Request $request, $id) {

        $administrativo = Administrativo::find($id);

        $administrativo->delete();

         return redirect()->route('ver.administrativos')
                     ->with(['message'=>'Administrativo eliminado exitosamente']);
    }

    public function verCoordinador(){

        $coordinadores = Coordinador::orderBy('id', 'DESC')->paginate(6);

        return view('coordinador.verCoordinador')->with('coordinadores' , $coordinadores);
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

    public function editarCoordinador(Request $request, $id) {
        
        $coordinador = Coordinador::find($id);


        $carreras = Carrera::all();


        return view('docente.editarCoordinador')->with('carreras',$carreras)
                                         ->with('coordinador', $coordinador)
                                         ->with(['message'=>'Usuario actualizado exitosamente.']);
    }

    public function actualizarCoordinador(Request $request, $id){


        $coordinador = Coordinador::find($id);

        $carrera = (int)$request->get('carrera');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');


        $coordinador->carrera_id = $carrera;
        $coordinador->nombre    = $nombre;
        $coordinador->apellidos = $apellidos;
        $coordinador->email     = $email;

        $coordinador->update();

        return redirect()->route('editar.coordinador', $id)
                     ->with(['message'=>'Coordinador actualizado correctamente.']);
    }

    public function eliminarCoordinador(Request $request, $id) {

        $coordinador = Coordinador::find($id);

        $coordinador->delete();

         return redirect()->route('ver.coordinador')
                     ->with(['message'=>'Coordinador eliminado exitosamente']);
    }
}
