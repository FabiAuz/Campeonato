@extends('welcome')
@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Tabla de posiciones</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Tabla de posiciones</li>
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
                                    <li> <?php $cont+=1;?>
                                        <div class="ftb-position">
                                            {{$cont}}
                                        </div>
                                        <div class="ftb-team-name">
                                            <a href="#">{{$equipo->equipo->nombre}}</a>
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
                                    @endforeach
                                </ul>
                                <!--// RATING TABLE //-->
                            </div>
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
			