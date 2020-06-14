<?php

namespace App\Http\Controllers;

use App\Campeonato;
use App\Equipo;
use App\Estadio;
use App\Jugador_equipo;
use App\Jugador_partido;
use App\Partido;
use App\Resultado;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampeonatoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {

        $campeonatos=Campeonato::all();
        return View('Campeonato.listar', compact('campeonatos'));

    }

    public function listar_equipos($id)
    {
        $campeonato=Campeonato::find($id);
        $partidos= Partido::where('campeonato_id', '=', $campeonato->id)->get();
        $cant=count($partidos);
        $equiposCampeonato=Resultado::where('campeonato_id', '=', $campeonato->id)->get();
        $equipos=Equipo::all();
        if ($cant==0)
        {
            return View('Campeonato.EscogerEquipos', compact('equipos', 'campeonato'));
        }
        else
        {
            return View('Campeonato.listarEquipos', compact('equiposCampeonato','campeonato'));
        }
    }


    public function fixture($id)
    {

        $campeonato=Campeonato::find($id);

        $jornadas=DB::table('partidos')->select('jornada')
                    ->where('campeonato_id', '=', $id)
                    ->orderBy('jornada','ASC')->groupBy('jornada')->pluck('jornada');


        if ( $campeonato['modalidad']=='all') {
            $partidos= Partido::where('campeonato_id', '=', $id)
                ->orderBy('jornada','ASC')->get();
            $resultado=Resultado::where('campeonato_id',"=", $id)
                ->orderBy('puntos','DESC')
                ->get();
            return View('Campeonato.fixture', compact('campeonato','partidos','resultado','jornadas'));
        }
        else{
            $partidos= Partido::where('campeonato_id', '=', $id)->where('fase','=','1')
                ->orderBy('jornada','ASC')->get();

            $resultado=Resultado::where('campeonato_id',"=", $id)->where('fase','=','1')
                ->orderBy('puntos','DESC')
                ->get();
            $grupos=DB::table('partidos')->select('grupo')
                ->where('campeonato_id', '=', $id)
                ->orderBy('grupo','ASC')->groupBy('grupo')->pluck('grupo');

            return View('Campeonato.fixturecopa', compact('campeonato','partidos','jornadas','grupos','resultado'));
        }


    }


    public function create()
    {

        return view('Campeonato.registrar');
    }



    public function goleadores($id_camp)
    {
        $partidos=Partido::where('campeonato_id','=',$id_camp)->get();
        $campeonato=Campeonato::find($id_camp);
        $cont=0;
        $consulta=array();

        foreach ($partidos as $item) {
            $consulta[$cont]=Jugador_partido::where('partido_id','=',$item->id);
                $cont+=1;
        }

        return View('Campeonato.goleadores', compact('consulta','campeonato'));

    }

    public function listar_jugadores($id,$id_camp)
    {
        $equipo=Equipo::find($id);
        $jugadores=Jugador_equipo::where('equipo_id', '=', $id)->get();

        return View('Campeonato.listarjugadores', compact('jugadores','id_camp','equipo'));
    }

    public function store(Request $request)
    {
        $request['usuario_id']=Auth::user()->id;
        Campeonato::create($request->all());

        $mensaje = "Se ha registrado el campeonato";

        return View('Campeonato.registrar', compact('mensaje'));
    }

    public function update_equipo(Request $request)
    {

        $id_camp = $request['id_campeonato'];
        $partidos=Partido::where('campeonato_id', '=', $id_camp)->get();

        $lista=$request->lista;

        foreach ($partidos as $partido) {

            foreach ($lista as $item) {
                Jugador_partido::create([

                    'jugador_id' => $item,
                    'partido_id' => $partido->id,
                ]);
            }
        }

        return redirect()->action('CampeonatoController@listar_equipos',$id_camp);
    }


    protected function team_name($num, $names) {
        $i = $num - 1;
        if (sizeof($names) > $i && strlen(trim($names[$i])) > 0) {
            return trim($names[$i]);
        } else {
            return $num;
        }
    }

    public  function partidos_fase2($id){

            $result=DB::table('resultados')->where([['campeonato_id', '=', $id],['fase', '=', '2']])->count();

            if($result==0) {
                $grupoA = Resultado::where('campeonato_id', '=', $id)->where('grupo', '=', 'a')->where('fase', '=', '1')->orderBy('puntos', 'DSC')->get();
                $grupoB = Resultado::where('campeonato_id', '=', $id)->where('grupo', '=', 'b')->where('fase', '=', '1')->orderBy('puntos', 'DSC')->get();
                $grupocC = Resultado::where('campeonato_id', '=', $id)->where('grupo', '=', 'c')->where('fase', '=', '1')->orderBy('puntos', 'DSC')->get();
                $grupoD = Resultado::where('campeonato_id', '=', $id)->where('grupo', '=', 'd')->where('fase', '=', '1')->orderBy('puntos', 'DSC')->get();

                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupoA[0]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupoA[1]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupoB[0]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupoB[1]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupocC[0]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupocC[1]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupoD[0]->equipo_id,
                    'fase' => 2
                ]);
                Resultado::create([
                    'campeonato_id' => $id,
                    'equipo_id' => $grupoD[1]->equipo_id,
                    'fase' => 2
                ]);

                Partido::create([
                    'fecha' => '2018-07-8',
                    'equipo1_id' => $grupoA[0]->equipo_id,
                    'equipo2_id' => $grupoB[1]->equipo_id,
                    'campeonato_id' => $id,
                    'fase' => 2

                ]);
                Partido::create([
                    'fecha' => '2018-07-8',
                    'equipo1_id' => $grupoA[1]->equipo_id,
                    'equipo2_id' => $grupoB[0]->equipo_id,
                    'campeonato_id' => $id,
                    'fase' => 2

                ]);
                Partido::create([
                    'fecha' => '2018-07-8',
                    'equipo1_id' => $grupocC[0]->equipo_id,
                    'equipo2_id' => $grupoD[1]->equipo_id,
                    'campeonato_id' => $id,
                    'fase' => 2

                ]);
                Partido::create([
                    'fecha' => '2018-07-8',
                    'equipo1_id' => $grupocC[1]->equipo_id,
                    'equipo2_id' => $grupoD[0]->equipo_id,
                    'campeonato_id' => $id,
                    'fase' => 2

                ]);
                $campeonato = Campeonato::find($id);
                $resultado = Resultado::where('campeonato_id', "=", $id)->where('fase', '=', '2')
                    ->orderBy('puntos', 'DESC')
                    ->get();
                $partidos = Partido::where('campeonato_id', '=', $id)->where('fase', '=', '2')->get();
                return View('Campeonato.fixturefase2', compact('campeonato', 'partidos', 'resultado'));
            }else {
                $campeonato = Campeonato::find($id);
                $resultado = Resultado::where('campeonato_id', "=", $id)->where('fase', '=', '2')
                    ->orderBy('puntos', 'DESC')
                    ->get();
                $partidos = Partido::where('campeonato_id', '=', $id)->where('fase', '=', '2')->get();
                return View('Campeonato.fixturefase2', compact('campeonato', 'partidos', 'resultado'));
            }
    }

    protected function  generarMundial($grupo,$names,$id)
    {
        $inicioCampeonato = Campeonato::where('id', '=', $id)->get(array('fecha_inicio'));
        $fecha = $inicioCampeonato[0]->fecha_inicio;
        $empdia = 1;
        $teams = sizeof($names);
        $totalRounds = $teams - 1;
        $matchesPerRound = $teams / 2;
        for ($round = 0; $round < $totalRounds; $round++) {

            for ($match = 0; $match < $matchesPerRound; $match++) {
                $home = ($round + $match) % ($teams - 1);
                $away = ($teams - 1 - $match + $round) % ($teams - 1);
                if ($match == 0) {
                    $away = $teams - 1;
                }
                $nombreA = $this->team_name($home + 1, $names);
                $nombreB = $this->team_name($away + 1, $names);

                Partido::create([
                    'jornada' => $empdia,
                    'grupo' => $grupo,
                    'fecha' => $fecha,
                    'equipo1_id' => $nombreA,
                    'equipo2_id' => $nombreB,
                    'campeonato_id' => $id,
                    'fase'=>1

                ]);


            }
            $empdia++;
        }
    }

        protected function  todosContraTodos($names,$id,$dias)
    {
        $inicioCampeonato = Campeonato::where('id', '=', $id)->get(array('fecha_inicio'));
        $fecha=$inicioCampeonato[0]->fecha_inicio;
        $empdia=1;
        $ndia=0;
        $teams = sizeof($names);
        $totalRounds = $teams - 1;
        $matchesPerRound = $teams / 2;
        for ($round = 0; $round < $totalRounds; $round++) {
            $nfecha=date("Y-m-d",strtotime($fecha."+".$ndia."days"));
            for ($match = 0; $match < $matchesPerRound; $match++) {
                $home = ($round + $match) % ($teams - 1);
                $away = ($teams - 1 - $match + $round) % ($teams - 1);
                if ($match == 0) {
                    $away = $teams - 1;
                }
                $nombreA=$this-> team_name($home + 1, $names);
                $nombreB=$this->team_name($away + 1, $names);

                Partido::create([
                    'jornada' =>$empdia,
                    'fecha'=>$nfecha,
                    'equipo1_id' => $nombreA,
                    'equipo2_id' => $nombreB,
                    'campeonato_id' =>$id,
                    'fase'=>1

                ]);
            }
            $ndia+=$dias;
            $empdia++;
        }


    }


    public function campeonato_equipos(Request $request)
    {
        $id_camp=$request['id_campeonato'];
        $modalidad= Campeonato::find($id_camp);
        $inicioCampeonato = Campeonato::where('id', '=', $id_camp)->get(array('fecha_inicio'));
        $fecha=$inicioCampeonato[0]->fecha_inicio;
        $lista=$request->lista;

        if ( $modalidad['modalidad']=='all') {
            foreach ($lista as $item)
            {
                Resultado::create([
                    'campeonato_id' =>$id_camp,
                    'equipo_id'=>$item,
                    'fase'=>1
                ]);
            }
            $this->todosContraTodos($lista,$id_camp,$modalidad['dias']);

        }else {
            $grupo = 'a';
            $listaa = array_slice($lista, 0, 4);
            foreach ($listaa as $item) {
                Resultado::create([
                    'campeonato_id' => $id_camp,
                    'equipo_id' => $item,
                    'grupo' => $grupo,
                    'fase'=>1
                ]);
            }
            $this->generarMundial($grupo, $listaa, $id_camp);
            $grupo = 'b';
            $listab = array_slice($lista, 4, 4);
            foreach ($listab as $item) {
                Resultado::create([
                    'campeonato_id' => $id_camp,
                    'equipo_id' => $item,
                    'grupo' => $grupo,
                    'fase'=>1
                ]);
            }
            $this->generarMundial($grupo, $listab, $id_camp);
            $grupo = 'c';
            $listac = array_slice($lista, 8, 4);
            foreach ($listac as $item) {
                Resultado::create([
                    'campeonato_id' => $id_camp,
                    'equipo_id' => $item,
                    'grupo' => $grupo,
                    'fase'=>1
                ]);
            }
            $this->generarMundial($grupo, $listac, $id_camp);
            $grupo = 'd';
            $listad = array_slice($lista, 12, 4);
            foreach ($listad as $item) {
                Resultado::create([
                    'campeonato_id' => $id_camp,
                    'equipo_id' => $item,
                    'grupo' => $grupo,
                    'fase'=>1


                ]);
            }
            $this->generarMundial($grupo, $listad, $id_camp);

        }

        return redirect()->action('CampeonatoController@listar_equipos',$id_camp);

    }

    public function show($id)

    {
        //
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
         }


    public function eliminar($id)
    {

        Campeonato::find($id)->delete();
        return redirect()->action('CampeonatoController@index');

    }

}
