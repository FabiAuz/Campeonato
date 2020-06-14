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
							  <li class="active">{{$campeonato->nombre}}</li><li class="active">Fase de Grupos</li>
							</ul>
						</div>
					</div>
				</div>
				
				
						
				<div class="kode_fixture_wraper">
					<div class="container">
						<div class="heading5 black margin">
								<h4>Fase de grupos</h4>
								</div>
								
						<?php $esp=0 ?>
						<div class="row">
						@foreach($grupos as $grupo)
							@if($grupo!="")
							<?php $esp+=1 ?>
								@if($esp==3)
								</div><br><br><br>
								<div class="row">
								@endif
							<div class="col-md-6">
								<div class="heading5 black margin">
									<h4>Tabla de Posiciones<span> GRUPO {{$grupo}}</span></h4>
								</div>
                                <ul class="ftb-rating-table">
                                    <li style="background-color: #e01a22">
                                        <div class="ftb-position">
                                            #
                                        </div>
                                        <div class="ftb-team-name">
                                            <a href="#">Equipo</a>
                                        </div>
                                        <div class="ftb-team-points">
                                            Pts
                                        </div>
                                        <div class="ftb-team-points">
                                            PJ
                                        </div>
                                        <div class="ftb-team-points">
                                            PP
                                        </div>
                                        <div class="ftb-team-points">
                                            GF
                                        </div>
                                        <div class="ftb-team-points">
                                            GC
                                        </div>
                                        <div class="ftb-team-points">
                                            Dif
                                        </div>
                                    </li>
                                    <?php $cont=0;?>
                                    @foreach ($resultado as $equipo)
										@if($equipo->grupo==$grupo)
										<li> <?php $cont+=1;?>
											<div class="ftb-position">
												{{$cont}}
											</div>
											<div class="ftb-team-name">
												{{$equipo->equipo->nombre}}
											</div>
											<div class="ftb-team-points">
												{{$equipo->puntos}}
											</div>
											<div class="ftb-team-points">
												{{$equipo->PJ}}
											</div>
											<div class="ftb-team-points">
												{{$equipo->PP}}
											</div>
											<div class="ftb-team-points">
												{{$equipo->goles}}
											</div>
											<div class="ftb-team-points">
												{{$equipo->GC}}
											</div>
											<div class="ftb-team-points">
												{{$equipo->DIF}}
											</div>
										</li>
										@endif
                                    @endforeach
                                </ul>
							</div>
						@endif
						@endforeach
							
						</div>
							
							
							</div>
						</div>
					 
					<form method="get" action="{{url('fase2',$campeonato->id)}}">
					<div class="col-md-12">
                        <div class="kode_contant_area">
                            <button type="submit">Siguiente Fase</button>
                        </div>
                    </div>
					</form>
					
						<div class="heading5 black margin">
								<h4>Calendario de partidos</h4>
								</div>
						@foreach($grupos as $grupo)
						@if ($grupo!="")
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								
								<div class="heading5 black margin">
								<h4><span>GRUPO {{$grupo}}</span></h4>
								</div>
								<div class="ftb-tabs-wrap wrap_3">
								@foreach($jornadas as $jornada)
									@if($jornada!="")
									<div class="ftb_tabs_drop">
                                        <h5><b>Jornada:</b> {{$jornada}}</h5>
									</div>
									@foreach($partidos as $partido)
										@if($partido->jornada==$jornada and $partido->grupo==$grupo)
									  <ul class="ftb-main-table table_2">
									
												<li>
													<div class="ftb-date date_2">
														<span style="padding-top: 15px;">{{$partido->fecha}} {{$partido->hora}}</span>
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
                                                    @if ($partido->arbitro!="" and $partido->hora!="")
                                                        <div class="ftb-ticket ticket_2"><a  class="hire"  href="{{action('PartidoController@marcadores',$partido->id)}}">Mar</a></div>
                                                    @else
                                                        <div class="ftb-ticket ticket_2" ><button onclick="return mensaje()" style="background-color:#23272a;" class="hire"  >Mar</button></div>

                                                    @endif
                                                </li>
												 

											</ul>
											@endif
											@endforeach
										@endif
										@endforeach
								</div>
							</div>
						</div>	
							<br>
						@endif
						@endforeach
							
							
				
					</div>
				</div>
				
				
				
				
				
			   <script>
       function mensaje(){
           alert("Debe completar los datos del partido previamente");
       }
    </script>	
		
@endsection
