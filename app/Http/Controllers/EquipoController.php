<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador_equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
class EquipoController extends Controller
{




    public function index()
    {
        $equipos=Equipo::all();
        return View('Equipo.listar', compact('equipos'));

    }

    public function lista()
    {

        $equipos=DB::table('equipos')->select('*')
            ->orderBy('nombre','ASC')->get();

        return View('Equipo.presentar', compact('equipos'));

    }

    public function create()
    {
        return view('Equipo.registrar');
    }


    public function store(Request $request)
    {

        $ruta = public_path().'/Imagenes/Equipos/';

        // recogida del form
        $imagenOriginal = $request->file('logo');

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);
        // generar un nombre aleatorio para la imagen
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

        $imagen->resize(300,300);

        // guardar imagen
        // save( [ruta], [calidad])
        $imagen->save($ruta . $temp_name, 100);
        $id=Auth::user()->id;


        Equipo::create([
            'id'=>$request['id'],
            'nombre'=>$request['nombre'],
            'fecha_creacion'=>$request['fecha_creacion'],
            'descripcion'=>$request['descripcion'],
            'propietario'=>$request['propietario'],
            'logo'=>$temp_name,
            'presidente_id'=>$id,
            ]);

        return redirect()->route('equipos.index')->with('success','Registro creado satisfactoriamente');

    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );

        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugadores = Jugador_equipo::where('equipo_id', '=', $id)->get(array('jugador_id'));
        $equipo=Equipo::find($id);
        return View('Equipo.listar_jugadores', compact('jugadores','equipo'));

    }

    public function edit($id)
    {
        $equipo=Equipo::find($id);
        return(view('Equipo.editar',compact('equipo')));

    }

    public function update(Request $request, $id)
    {
        $datos=$request->all();
        $datos['presidente_id']=Auth::user()->id;
        Equipo::find($id)->update($datos);
        return redirect()->route('equipos.index')-> with('success','Se actualizo');
    }


    public function eliminar($id)
    {

        Equipo::find($id)->delete();
        return redirect()->action('EquipoController@index');

    }

}
