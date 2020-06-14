@extends('welcome')

@section('contenido')
    <div class="kode_benner1 bamnner2">
        <div class="kode_benner1_text">
            <h2>Equipos</h2>
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
	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<section class="section_1"> <br><br>
						<!--// HEADING 5 //-->
						<div class="heading5 black margin">
						  <h4>Nuestros <span>Equipos</span></h4>
						</div>
						<!--// HEADING 5 //-->
						<div class="row">
						  <!--// FOOTBALL TEAM //-->
						  <?php $cont=0 ?>
                            @foreach ($equipos as $equipo)
							<?php $cont+=1; ?>
						  <div class="col-md-3 col-sm-6">
								<div class="ftb-team-thumb">
								  <figure><img src="Imagenes/Equipos/{{$equipo->logo}}" style="height:180px;width: 300px" alt=""></figure>
								  <div class="ftb-team-dec dec_2">
									<span>{{$cont}}</span>
									<div class="text">
									  <a href="#">{{$equipo->nombre}}</a>
									  <p>{{$equipo->fecha_creacion}}</p>
									</div>
								
									<a class="arrow-iconbtn" href="{{action('EquipoController@show',$equipo->id)}}"><i class="fa fa-arrow-right "></i></a>
								  </div>
								</div>
						    </div>
                            @endforeach
						</div>

		
			</section>
		</div>
	</div>
@endsection