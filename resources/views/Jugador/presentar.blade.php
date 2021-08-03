@extends('welcome')

@section('contenido')


	<div class="kode_benner1 bamnner2">
		<div class="kode_benner1_text">
			<h2>JUGADOR {{$jugador->nombre}}</h2>
		</div>
		<div class="kode_benner1_cols">
			<div class="container kf_container">
				<ul class="breadcrumb">
					<li><a href="#"></a>Inicio</li>
					<li class="active">Jugadores</li>
					<li class="active">{{$jugador->nombre}}</li>
					
				</ul>
			</div>
		</div>
	</div>
	
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


                    <div class="kode_player_wraper wrp_3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="kode_ply_des">
                                            <div class="col-md-5">
                                                <div class="kode_player_fig fig_2">
                                                    <figure>
                                                        <img src="/Imagenes/Jugadores/{{$jugador->imagen}}"  alt="">
                                                        <figcaption>
                                                            <a href="#"><img src="{{url('images/ftb-result.png')}}"  alt=""></a>
                                                            <div class="kode_player_text">
                                                                <h6>Equipo: Eagle Sharks </h6>
                                                                <h6>Jugador No : {{$jugador->numero}}</h6>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="kode_player_item">
                                                    <h2 class="kode_ply_titile"><span>{{$jugador->id}}</span> {{$jugador->nombre}} &nbsp&nbsp{{$jugador->apellido}} </h2>
                                                    <div class="row">
                                                        <div class="kode-ply-slid">
                                                            <div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="kode_ply_list">
                                                                        <a href="#">NACIONALIDAD:<span>Ecuatoriana</span></a>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="kode_ply_list">
                                                                        <a href="#">Estatura :<span>{{$jugador->estatura}}</span></a>
                                                                    </div>
                                                                </div>
																
																<div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="kode_ply_list">
                                                                        <a href="#">Ciudad:<span> {{$jugador->ciudad}}</span></a>
                                                                    </div>
																</div>
																<div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="kode_ply_list">
                                                                        <a href="#">Número:<span> {{$jugador->numero}}</span></a>
                                                                    </div>
																</div>
																<div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="kode_ply_list">
                                                                        <a href="#">Posicion:<span> {{$jugador->posicion}}</span></a>
                                                                    </div>
																</div>
																<div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="kode_ply_list">
                                                                        <a href="#">Fecha Nacimiento:<span> {{$jugador->fecha_nac}}</span></a>
                                                                    </div>
																</div>

                                                            </div>
															 

                                                               


                                                           
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="kode_ply_text">
                                                                <p>{{$jugador->descripcion}}</p>
                                                                <div class="kode_ply_icon">
                                                                    <h6>Social Network :</h6>
                                                                    <ul>
                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                          
							  </div>
                               
							</div>
                        </div>
                    </div>
                    <!--// KODE PLAYER WRAPER END //-->

                  
		</div>
    </div>


      
	@endsection

