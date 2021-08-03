<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador;
use App\Jugador_equipo;
use Image;
use Illuminate\Http\Request;

class JugadorController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $jugadores=Jugador::all();
        return View('Jugador.listar', compact('jugadores'));
    }


    public function lista($id)
    {
        $jugador=Jugador::find($id);
        return View('Jugador.presentar', compact('jugador'));

    }
    public function create()
    {
        $equipos=Equipo::all();
        return view('Jugador.registrar', compact('equipos'));
    }

    public function store(Request $request)
    {
        $mensaje="Se ha registrado el jugador";
        $ruta = public_path().'/Imagenes/Jugadores/';

        // recogida del form
        $imagenOriginal = $request->file('imagen');

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);
        // generar un nombre aleatorio para la imagen
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

        $imagen->resize(300,300);

        // guardar imagen
        // save( [ruta], [calidad])
        $imagen->save($ruta . $temp_name, 100);
        $jugadores= Jugador::all();
        $jugador=$jugadores->last();
        $temp=(int)$jugador['id'];
        $id=1+$temp;
        $datos=$request->all();
        $datos['id']=$id;
        $datos['imagen']=$temp_name;
        Jugador::create($datos);

        $mensaje = "Se ha registrado el jugador";
        Jugador_equipo::create([
            'jugador_id'=>$id,
            'equipo_id'=>$request['equipo_id'],
        ]);

        return redirect()->route('jugadores.index')->with('success','Registro creado satisfactoriamente');
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

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugador=Jugador::find($id);
        return(view('Jugador.editar',compact('jugador')));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jugador::find($id)->update($request->all());
        return redirect()->route('jugadores.index')-> with('success','Se actualizo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        Jugador::find($id)->delete();
        return redirect()->action('JugadorController@index');

    }
}
