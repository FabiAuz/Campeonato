@extends('welcome')
@section('contenido')


	<div class="kode_benner1 bamnner2">
		<div class="kode_benner1_text">
			<h2>LISTADO DE EQUIPOS</h2>
		</div>
		<div class="kode_benner1_cols">
			<div class="container kf_container">
				<ul class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li class="active">Lista de Equipos</li>
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
							<th>logo</th>
							<th>Nombre</th>
							<th>Fecha de creacion</th>
							<th>Propietario</th>
							<th>Acciones</th>
						</tr>
						@foreach ($equipos as $equipo)
							<tr class="kode_ply_two" data-id="{{$equipo->id}}">
								<td><img src="Imagenes/Equipos/{{ $equipo->logo}}" width="100" height="70"></td>
								<td>{{$equipo->nombre}}</td>
								<td>{{$equipo->fecha_creacion}}</td>
								<td>{{$equipo->propietario}}</td>
								<td>
									<a class="btn btn-success btn-xs" href="{{action('EquipoController@edit',$equipo->id)}}" >Editar&nbsp<span class="fa fa-pencil"></span></a>&nbsp&nbsp
									<a class="btn btn-default btn-xs" href="{{action('EquipoController@eliminar',$equipo->id)}}" >Eliminar&nbsp<span class="fa fa-times"></span></a>&nbsp&nbsp
									
									
								</td>
							</tr>
						@endforeach

					</table>
				</div>
			</div>
			<div class="kode_ply_caption">
				<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>

	</div>
@endsection

