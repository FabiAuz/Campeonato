@extends('welcome')
@section('contenido')

				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>LISTA DE CAMPEONATOS</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Lista de Campeonatos</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="kode_ply_gallery">
					<div class="container">
					
						<div class="row">
						<div class="col-md-1"></div>
							<div class="col-md-10">
								<table class="kode_ply_table">
									<tr class="kode_ply_first">
										<th>Nombre</th>
										<th>Cantidad de Equipos</th>
										<th>Fecha de Inicio</th>
										<th>Modalidad</th>
										<th> Acciones </th>
									</tr>
									@foreach ($campeonatos as $campeonato)
									<tr class="kode_ply_two" data-id="{{$campeonato->id}}">
										<td>{{$campeonato->nombre}}</td>
										<td>{{$campeonato->cant_equipos}}</td>
										<td>{{$campeonato->fecha_inicio}}</td>
										@if ($campeonato->modalidad== "all")
										<td>Campeonato</td>
										@else
											<td>Copa</td>
										@endif
										<td>
											<a class="btn btn-danger btn-xs" href="{{action('CampeonatoController@listar_equipos',$campeonato->id)}}" >Equipos&nbsp<span class="fa fa-plus"></span></a>&nbsp&nbsp
											<a class="btn btn-success btn-xs" href="{{action('CampeonatoController@fixture',$campeonato->id)}}" >Fixture&nbsp<span class="fa fa-eye"></span></a>&nbsp										
										</td>
									</tr>
									@endforeach

								</table>
							</div>
						</div>
						<div class="kode_ply_caption">
							<p>Una vez registrado el campeonato se debe escoger los equipos que participaran, y posteriormente escoger la plantilla de jugadores de cada equipo.</p>
						</div>
					</div>

				
				</div>
	@endsection

