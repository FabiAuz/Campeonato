@extends('welcome')

@section('contenido')
    <div class="kode_benner1 bamnner2">
        <div class="kode_benner1_text">
            <h2>Equipo {{$equipo->nombre}}</h2>
        </div>
        <div class="kode_benner1_cols">
            <div class="container kf_container">
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Equipos</li>
                </ul>
            </div>
        </div>
    </div>
	
	<div class="kode_blog_wraper">
		<div class="container">
	
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
								<div class="kode_blog_fig">
									<div class="kode_blog2_thumb">
										<figure>
											<img src="/Imagenes/Equipos/{{$equipo->logo}}" alt="">
											<figcaption>
												<a href="#"><i class="fa fa-expand"></i></a>
											</figcaption>
										</figure>
									</div>
									<div class="kode_blog_text text_2 text_3">
										<div class="kode_blog_date date_2">
											<span>{{$equipo->nombre}}</span>
										</div>
										<div class="kode_blog_date date_2">
											<p>Fecha de creación: {{$equipo->fecha_creacion}}</p>
											
										</div>
										<div class="kode_blog_caption caption_2">
											<h5>Presidente: {{$equipo->presidente->nombre}}
											</h5>
											<p>{{$equipo->descripcion}}</p>
										</div>	
									
									</div>	
								</div>
				</div>	
			</div>
			
			<div class="row">		
				<div class="col-md-10 col-md-offset-1">
					<section class="section_1"> <br><br>
							<!--// HEADING 5 //-->
							<div class="heading5 black margin">
							  <h4>Jugadores de <span>{{$equipo->nombre}}</span></h4>
							</div>
							<!--// HEADING 5 //-->
							<div class="row">
							  <!--// FOOTBALL TEAM //-->
								@foreach ($jugadores as $jugador)
							  <div class="col-md-3 col-sm-6">
									<div class="ftb-team-thumb">
									  <figure><img src="/Imagenes/Jugadores/{{$jugador->jugador->imagen}}" style="height:200px;width: 150px" alt=""></figure>
									  <div class="ftb-team-dec dec_2">
										<span>{{$jugador->jugador->numero}}</span>
										<div class="text">
										  <a href="#">{{$jugador->jugador->nombre}}</a>
										  <p>{{$jugador->jugador->posicion}}</p>
										</div>
										<a class="arrow-iconbtn" href="{{action('JugadorController@lista',$jugador->jugador->id)}}"><i class="fa fa-arrow-right "></i></a>
									  </div>
									</div>
								</div>
								@endforeach
							</div>
					</section>
				</div>
			</div>
	
	
		</div>
	</div>
@endsection