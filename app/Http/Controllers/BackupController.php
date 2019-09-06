<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Backup;

class BackupController extends Controller
{
    use AuthenticatesUsers;

    //filtro para que solo la sesion de admin pueda ingresara las urls
    function __construct(){

        $this->middleware('auth:admins', ['only' => ['showBackups']
        ]);

    }

    public function showBackups() {

    	$backups = Backup::orderBy('id', 'DESC')->paginate(10);

    	return view('admin.backups')->with('backups', $backups);
    }

    public function storeBackup(Request $request) {

    	//instancio objeto
    	$backup = new Backup;

    	//recojo params
    	$nombre = $request->input('nombre');
   		$archivo = $request->file('backup');

   		//Subir el archivo
   		if ($archivo) {
   			//Poner nombre unico
   			$archivo_name = time().$archivo->getClientOriginalName();

   			//Guardar en el storage (app/users)
   			Storage::disk('backups')->put($archivo_name, File::get($archivo));

   			//seteo el valor en mi session usuario
   			$backup->archivo = $archivo_name;
   		}

   		$backup->nombre = $nombre;

   		$backup->save();

   		return redirect()->route('show.backups')->with(['message'=>'Su backup ha sido guardado en el sistema.']);
    }

    public function getBackup($filename){
    	$path = storage_path('app/backups');
    	$file = $path.'/'.$filename;
   			return Response::download($file);
	}

	public function deleteBackup($id){

		$backup = Backup::find($id);

		$backup->delete();

		return redirect()->route('show.backups')->with(['message'=>'Se ha eliminado este registro exitosamente.']);
	}


}
