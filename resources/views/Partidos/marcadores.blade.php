@extends('welcome')
@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Marcadores de partidos</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Marcadores del partido</li>
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
                           `<div class="col-md-8">
									<div class="kode_ticket_sig_row">
										<ul>
											<li>
												<div class="kode_ticket_sig_fig">
													<figure>
														<img src="/Imagenes/Equipos/{{ $equipo1->logo}}" style="height: 100px;width: 150px" alt="">
													</figure>
													<h4>{{$equipo1->nombre}}</h4>
												</div>
											</li>
											<li>
												<div class="kode_ticket_sig_fig fig_2">
													<span>VS</span>
													<a href="#"><i class="fa fa-clock-o"></i>{{$partido->hora}} </a>
													
												</div>
											</li>
											<li>
												<div class="kode_ticket_sig_fig">
													<figure>
														<img  src="/Imagenes/Equipos/{{ $equipo2->logo}}"style="height: 100px;width: 150px" alt="">
													</figure>
													<h4>{{$equipo2->nombre}}</h4>
												</div>
											</li>
										</ul>
									</div>
								
								
									<input type="hidden" id="partido" value="{{$partido->id}}" >
									<form method="GET" action="{{url('fixture',$partido->campeonato_id)}}">
									<div class="kode_ticket_standerd_detail">
										<div class="kode_standerd_date">
											<h6><i class="fa fa-calendar-minus-o"></i>{{$fecha}}</h6>
											<h6 class="full-right"><i class="fa fa-home"></i>Estadio: {{$partido->estadio->nombre}} </h6>
										</div>
										<ul>
											<li>
												<div class="kode_satnderd_text">
													<a href="#"><i class="fa fa-futbol-o"></i></a>
													<div class="kode_standerd_title">
														<h4>{{$equipo1->nombre}}</h4>
														<p>Equipo 1</p>
													</div>
												</div>
												<div class="kode_standerd_select">
													<!-- Spinner -->
													<h2 class="demoHeaders">Goles:</h2>
													<h4 style="color: #fff;">{{$partido->gol_equipo1}}</h4>
												</div>
												<a class="kode_stand_btn"  href="{{url('goles_jugadores',['partido'=>$partido->id,'equipo'=>$equipo1->id])}}" > Jugadores</a>

											</li>
											<li>
												<div class="kode_satnderd_text">
													<a href="#"><i class="fa fa-futbol-o"></i></a>
													<div class="kode_standerd_title">
														<h4>{{$equipo2->nombre}}</h4>
														<p>Equipo 2</p>
													</div>
												</div>
												
												<div class="kode_standerd_select">
													<!-- Spinner -->
													<h2 class="demoHeaders">Goles:</h2>
													<h4 style="color: #fff;">{{$partido->gol_equipo2}}</h4>
												</div>
												<a class="kode_stand_btn"  href="{{url('goles_jugadores',['partido'=>$partido->id,'equipo'=>$equipo2->id])}}" > Jugadores</a>
											</li>
										</ul>
									</div>
								
								<div class="col-md-3">
									<div class="kode_contant_area">
									<br><br>
										<button type="submit">Regresar</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				<!--// KODE CONTACT FORM END//-->
				
				<!--// KODE CONTACT SOCIAL START//-->
					<div class="kode_contact_social">
				
						
							<ul class="kode_contact_icon">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
					</div>
				</div>
       
@endsection	
			