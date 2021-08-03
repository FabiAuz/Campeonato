@extends('welcome')
@section('contenido')

	<!--// KODE BENNER1 START //-->
	<div class="kode_benner1 bamnner2">
		<div class="kode_benner1_text">
			<h2>LISTADO DE JUGADORES</h2>
		</div>
		<div class="kode_benner1_cols">
			<div class="container kf_container">
				<ul class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li class="active">Lista de Jugadores</li>
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
                            <th>Foto</th>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>apellido</th>
							<th>estatura</th>
							<th>Fecha de nacimiento</th>
							<th>Acciones</th>
						</tr>
						@foreach ($jugadores as $jugador)
							<tr class="kode_ply_two" data-id="{{$jugador->id}}">
                                <td><img src="Imagenes/Jugadores/{{ $jugador->imagen}}" width="100" height="100"></td>
								<td>{{$jugador->cedula}}</td>
								<td>{{$jugador->nombre}}</td>
								<td>{{$jugador->apellido}}</td>
								<td>{{$jugador->estatura}}</td>
								<td>{{$jugador->fecha_nac}}</td>
								<td>
									<a class="btn btn-success btn-xs" href="{{action('JugadorController@edit',$jugador->id)}}" >Editar&nbsp<span class="fa fa-pencil"></span></a>&nbsp&nbsp
									<a class="btn btn-info btn-xs" href="{{action('JugadorController@lista',$jugador->id)}}" >Ver&nbsp<span class="fa fa-eye"></span></a>&nbsp&nbsp
									<a class="btn btn-danger btn-xs" href="{{action('JugadorController@eliminar',$jugador->id)}}" >Eliminar&nbsp<span class="fa fa-times"></span></a>&nbsp&nbsp


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

