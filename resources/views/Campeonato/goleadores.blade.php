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
                                    @foreach ($consulta as $equipo)
                                    <li> <?php $cont+=1;?>
                                        <div class="ftb-position">
                                            {{$cont}}
                                        </div>
                                        <div class="ftb-team-name">
                                            {{$equipo->jugador_id->jugador_id}}
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
				
				
				
				
				

@endsection
