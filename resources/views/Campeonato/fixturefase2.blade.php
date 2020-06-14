@extends('welcome')
@section('contenido')

				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Campeonato {{$campeonato->nombre}}</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li> <li><a href="#">Campeonatos</a></li>
							  <li class="active">{{$campeonato->nombre}}</li><li class="active"></li>
							</ul>
						</div>
					</div>
				</div>
				
				
						
				<div class="kode_fixture_wraper">
					<div class="container">
					
					
						<div class="heading5 black margin">
								<h4>Calendario de partidos Cuarto de final</h4>
								</div>
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								
								<div class="heading5 black margin">
								<h4><span></span></h4>
								</div>
								<div class="ftb-tabs-wrap wrap_3">
								@foreach($partidos as $partido)
									
									<div class="ftb_tabs_drop">
                                        <h5><b>{{$partido->fecha}} {{$partido->hora}}</b> </h5>
									</div>
									  <ul class="ftb-main-table table_2">
									
												<li>
													<div class="ftb-date date_2">
														<span style="padding-top: 15px;"></span>
													</div>

												  <div class="ftb-compitatev tev_2">
													<div class="compitatev-team1">

																<img src="/Imagenes/Equipos/{{$partido->equipo1->logo}}" style="height:30px;width: 50px"  alt=""/>
																<a href="#">{{$partido->equipo1->nombre}}</a>

													</div>
													<span>VS</span>
													<div class="compitatev-team1 compitatev-team2">
														<img src="/Imagenes/Equipos/{{$partido->equipo2->logo}}" style="height:30px;width: 50px"alt=""/>
														<a href="#">{{$partido->equipo2->nombre}}</a>
													</div>
												  </div>
												  <div class="ftb-venue venue_2"><i>{{$partido->gol_equipo1}} - {{$partido->gol_equipo2}}</i></div>

												  <div class="ftb-ticket ticket_2"><a  class="hire"  href="{{action('PartidoController@edit',$partido->id)}}">Editar</a></div>
                                                    @if ($partido->arbitro!="" and $partido->hora!="" and $partido->fase="2")
                                                        <div class="ftb-ticket ticket_2"><a  class="hire"  href="{{action('PartidoController@marcadores',$partido->id)}}">Mar</a></div>
                                                    @else
                                                        <div class="ftb-ticket ticket_2" ><button onclick="return mensaje()" style="background-color:#23272a;" class="hire"  >Mar</button></div>

                                                    @endif
                                                </li>
												 

											</ul>
										@endforeach
								</div>
							</div>
						</div>	
							<br>
							
							
				
					</div>
				</div>
				
				
				
				
				
			   <script>
       function mensaje(){
           alert("Debe completar los datos del partido previamente");
       }
    </script>	
		
@endsection
