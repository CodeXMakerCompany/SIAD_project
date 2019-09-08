<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Docente;
use App\MaterialDidactico;
use Auth;
use App\User;
use App\MensajeDoc;
use App\Mensaje;

class DocenteController extends Controller
{	

	use AuthenticatesUsers;

	//filtro
	function __construct(){

		$this->middleware('auth:docentes', ['only' => [
                                            'secret',
                                            'getMaterial', 
                                            'getAlumnos',
                                            'chatDocente']]);

	}

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

    public function getMaterial(){

        $materialesDidacticos = MaterialDidactico::orderBy('id','DESC')->paginate(10);


        return view('docente.material')->with('materialesDidacticos', $materialesDidacticos);
    }

    public function storeMaterial(Request $request){

        $material = new MaterialDidactico();

        $docenteId = auth('docentes')->user()->id;

        $descripcion = $request->input('descripcion');

        $archivo = $request->file('material');

        //Subir el archivo
        if ($archivo) {
            //Poner nombre unico
            $archivo_name = time().$archivo->getClientOriginalName();

            //Guardar en el storage (app/users)
            Storage::disk('material_didactico')->put($archivo_name, File::get($archivo));

            //seteo el valor en mi session usuario
            $material->Archivo = $archivo_name;
        }

        $min = 1;
        $max = 500;

        $material->docente_id = $docenteId;
        $material->Descripcion = $descripcion;
        $material->CodigoMaterial = rand ( $min ,$max );

        $material->save();


        return redirect()->route('docente.material')->with(['message'=>'Nuevo material añadido!.']);
    }

    public function deleteMaterial($id){

        $material = MaterialDidactico::find($id);
        
        $material->delete();    
        
        return redirect()->route('docente.material')->with(['message'=>'Material eliminado!.']);
    }

    public function downloadMaterial($filename){
        $path = storage_path('app/material_didactico');
        $file = $path.'/'.$filename;
            return Response::download($file);
    }

    public function getAlumnos($search = null){

        if (!empty($search)) {
            $alumnos = User::where('email', 'LIKE', '%'.$search.'%')
                            ->orWhere('nombre', 'LIKE' ,'%'.$search.'%')
                            ->orderBy('id','DESC')
                            ->paginate(10);
        }else{
            $alumnos = User::orderBy('id','DESC')->paginate(10);
        }

        

        return view('docente.verAlumnos')->with('alumnos',$alumnos);
    }

    public function chatDocente($id_alumno){

        $alumno = User::find($id_alumno);

        //id usuario
        $id = Auth::id();
        $nombre = auth()->user()->nombre;

        //mensaje de los docentes en la session de docentes
        $collection = MensajeDoc::all();
        //mensaje de los alumnos en la sesion de docentes
        $collectionAlumnos = Mensaje::all();

        $mensajeAlumno = $collectionAlumnos->where('alumno_id', '=', $id_alumno);
        $mensajes = $collection->where('docente_id', '=', $id);  

        
        $mensajes->all();



        $mensajeAlumno->all();


        return view('mensaje.chatDocente')->with('alumno', $alumno)
                                          ->with('id', $id)
                                          ->with('nombre', $nombre)
                                          ->with('mensajes', $mensajes)
                                          ->with('mensajeAlumno', $mensajeAlumno);
   }

   

}
