<?php

namespace App\Http\Controllers;

use App\Campeonato;
use App\Equipo;
use App\Estadio;
use App\Jugador;
use App\Jugador_equipo;
use App\Jugador_partido;
use App\Partido;
use App\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Finder\Iterator\PathFilterIterator;
use Symfony\Component\VarDumper\Cloner\Data;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    public function tabla_posiciones($id)
    {


        return(view('Partidos.tabla_posiciones',compact('resultado')));

    }

    public function edit($id)
    {
        $partido=Partido::find($id);

        $equipo1=Equipo::find($partido['equipo1_id']);
        $equipo2=Equipo::find($partido['equipo2_id']);
        $estadios=Estadio::all();
        return(view('Partidos.editar',compact('equipo1','equipo2','estadios','partido','id_camp')));

    }
    public function update(Request $request, $id)
    {

        $guardar=Partido::find($id);
        $guardar->fecha=$request['fecha'];
        $guardar->hora=$request['hora'];
        $guardar->arbitro=$request['arbitro'];
        $guardar->estadio_id=$request['estadio_id'];

        $guardar->save();


        return redirect()->action('CampeonatoController@fixture',$guardar->campeonato_id);
    }


    public function marcadores($id){
        $partido=Partido::find($id);
        if($partido->hora==null or $partido->arbitro==null){
           return redirect()->action('CampeonatoController@fixture',$partido->campeonato_id);
        }else{
        $fecha=$this->fechaCastellano($partido['fecha']);
        $estadio=Estadio::find($partido['estadio_id']);
        $equipo1=Equipo::find($partido['equipo1_id']);
        $equipo2=Equipo::find($partido['equipo2_id']);
        $jugadores=Jugador::all();
        return(view('Partidos.marcadores',compact('partido','equipo1','equipo2','fecha','estadio','jugadores')));
        }
    }
    function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }


    public function guardar_goles_jugadores(Request $request)
    {

        $cont=1000;
        $partido=Partido::find($request['id_partido']);
        $id_equipo=$request['id_equipo'];
        foreach ($request['lista'] as $item) {
            $cont+=1;
            $guarda =Jugador_partido::find($item);
            $guarda->goles = $request[$cont];
            $guarda->save();
        }

        if ($partido['equipo1_id']==$id_equipo){
            $partido->gol_equipo1 = $request['totales'];
            $partido->save();

        }else{
            $partido->gol_equipo2 = $request['totales'];
            $partido->save();
        }
        $gol1=$partido->gol_equipo1;
        $gol2=$partido->gol_equipo2;
        $resultado1=Resultado::where('campeonato_id',"=", $partido->campeonato_id)->where('equipo_id','=',$partido->equipo1_id)
           -> where('fase','=','1')->get();
        $encontrado1=Resultado::find($resultado1[0]->id);
        $resultado2=Resultado::where('campeonato_id',"=", $partido->campeonato_id)
            -> where('fase','=','1')
            -> where('equipo_id','=',$partido->equipo2_id)->get();
        $encontrado2=Resultado::find($resultado2[0]->id);
        if($gol1!="" and $gol2!=""){
            if ($gol1==$gol2){
                $encontrado1->goles = $encontrado1->goles+$gol1;
                $encontrado1->puntos=$encontrado1->puntos +1;
                $encontrado1->PJ+=1;
                $encontrado1->PE=$encontrado1->PE +1;
                $encontrado1->GC=$encontrado1->GC +$gol2;
                $encontrado1->DIF=$encontrado1->DIF +($gol1-$gol2);
                $encontrado1->save();
                $encontrado2->goles = $encontrado2->goles+$gol2;
                $encontrado2->puntos=$encontrado2->puntos +1;
                $encontrado2->PJ+=1;
                $encontrado2->PE=$encontrado2->PE +1;
                $encontrado2->GC=$encontrado2->GC +$gol1;
                $encontrado2->DIF=$encontrado2->DIF +($gol2-$gol1);
                $encontrado2->save();

            }
            if ($gol1>$gol2){
                $encontrado1->goles = $encontrado1->goles+$gol1;
                $encontrado1->puntos=$encontrado1->puntos +3;
                $encontrado1->PJ+=1;
                $encontrado1->PG=$encontrado1->PG +1;
                $encontrado1->GC=$encontrado1->GC +$gol2;
                $encontrado1->DIF=$encontrado1->DIF +($gol1-$gol2);
                $encontrado1->save();
                $encontrado2->goles = $encontrado2->goles+$gol2;
                $encontrado2->puntos=$encontrado2->puntos;
                $encontrado2->PJ+=1;
                $encontrado2->PP=$encontrado2->PP +1;
                $encontrado2->GC=$encontrado2->GC +$gol1;
                $encontrado2->DIF=$encontrado2->DIF +($gol2-$gol1);
                $encontrado2->save();
            }
            if ($gol2>$gol1){
                $encontrado1->goles = $encontrado1->goles+$gol1;
                $encontrado1->puntos=$encontrado1->puntos ;
                $encontrado1->PJ+=1;
                $encontrado1->PP=$encontrado1->PP +1;
                $encontrado1->GC=$encontrado1->GC +$gol2;
                $encontrado1->DIF=$encontrado1->DIF +($gol1-$gol2);
                $encontrado1->save();
                $encontrado2->goles = $encontrado2->goles+$gol2;
                $encontrado2->puntos=$encontrado2->puntos+3;
                $encontrado2->PJ+=1;
                $encontrado2->PG=$encontrado2->PG +1;
                $encontrado2->GC=$encontrado2->GC +$gol1;
                $encontrado2->DIF=$encontrado2->DIF +($gol2-$gol1);
                $encontrado2->save();
            }
        }

        return redirect()->action('PartidoController@marcadores',$request['id_partido']);
    }

    public function goles_jugadores($partido , $id_equipo)
    {

        $jugadores= DB::table('jugador_partidos')
            ->join('jugadores', 'jugadores.id', '=', 'jugador_partidos.jugador_id')
            ->join('partidos', 'partidos.id', '=', 'jugador_partidos.partido_id')
            ->join('jugador_equipos', 'jugador_equipos.jugador_id', '=', 'jugadores.id')
            ->join('equipos', 'jugador_equipos.equipo_id', '=', 'equipos.id')
            ->select('jugador_partidos.id as id','jugador_partidos.posicion as posicion',
                'jugadores.id as jugador_id','jugadores.nombre as nombre','jugador_partidos.numero as numero','equipos.nombre as equipo')

            ->where([
                ['equipos.id', '=', $id_equipo],
                ['partidos.id', '=', $partido]])
            ->orderBy('jugadores.nombre','ASC')
            ->get();

        $equipo=Equipo::find($id_equipo);
        return(view('Partidos.goles_jugadores',compact('jugadores','equipo','partido')));
    }

    public function destroy($id)
    {

    }
}
