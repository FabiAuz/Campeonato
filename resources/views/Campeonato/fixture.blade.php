@extends('welcome')
@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Campeonato {{$campeonato->nombre}}</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li>Inicio</li>
							  <li class="active">{{$campeonato->nombre}}</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				

					<!--// KODE CONTACT FORM START//----------------------------------------------------------------------------------->
				<div class="kode_contact_form">
					<div class="container">
					<br><br>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
							<div class="heading5 black margin">
								<h4>Tabla de <span>Posiciones</span></h4>
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
                                            PG
                                        </div>
										 <div class="ftb-team-points">
                                            PE
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
                                            {{$equipo->PG}}
                                        </div>
										   <div class="ftb-team-points">
                                            {{$equipo->PE}}
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
                                    @endforeach
                                </ul>
                                <!--// RATING TABLE //-->
                            </div>
                        </div>
						</div>
				</div>
				<!--// KODE CONTACT FORM END//-->
				
				
				
				<div class="kode_fixture_wraper">
					<div class="container">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="heading5 black margin">
								<h4>Calendario de <span>Partidos</span></h4>
							</div>
								<div class="ftb-tabs-wrap wrap_3">
								<?php $cont=0; $cont2=1?>
								@foreach($jornadas as $jornada)
									<div class="ftb_tabs_drop">
                                        <h5><b>Jornada:</b> {{$jornada}}</h5>
										
									
									</div>
									@foreach($partidos as $partido)
										@if($partido->jornada==$jornada)
									  <ul class="ftb-main-table table_2">
                                         
												<li>
													<div class="ftb-date date_2">
														<span style="padding-top: 15px;">{{$partido->fecha}} {{$partido->hora}}</</span>
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

												  <div class="ftb-ticket ticket_2"><a  class="hire"  href="{{action('PartidoController@edit',$partido->id)}}" data-toggle="tooltip" data-placement="bottom" title="Editar datos del partido"><i class="fa fa-pencil"></i> </a></div>
                                                    @if ($partido->arbitro!="" and $partido->hora!="")
                                                        <div class="ftb-ticket ticket_2"><a  class="hire"  href="{{action('PartidoController@marcadores',$partido->id)}}" data-toggle="tooltip" data-placement="bottom" title="Registrar goles"><i class="fa fa-futbol-o"></i></a></div>
                                                    @else
                                                        <div class="ftb-ticket ticket_2" ><button onclick="return mensaje()" style="background-color:#23272a;" class="hire"  data-toggle="tooltip" data-placement="bottom" title="Registrar goles"><i class="fa fa-futbol-o"></i></button></div>
                                                                           
													@endif
                                                </li>
												 

											</ul>
											@endif
											@endforeach
										@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>

				
				
				
				
				
    <script>
       function mensaje(){
           alert("Debe completar los datos del partido previamente");
       }
    </script>
@endsection
