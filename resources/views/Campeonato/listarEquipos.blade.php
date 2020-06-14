@extends('welcome')
@section('contenido')

	<!--// KODE BENNER1 START //-->
	<div class="kode_benner1 bamnner2">
		<div class="kode_benner1_text">
			<h2>EQUIPOS REGISTRADOS</h2>
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
	<!--// KODE BENNER1 END //-->

	<!--// KODE CONTACT SOCIAL START//-->


	<div class="kode_ply_gallery">
		<div class="container">
			<div class="heading5 black b_2">
				<h4>Equipos  <span>Participantes</span> en el Campeonato <b>{{$campeonato->nombre}}</b></h4>
			</div>

			<div class="row">
				<div class="col-md-6 col-md-offset-3">


						<input  style="visibility:hidden;" type="text" name="id_campeonato" id="id_campeonato" value="{{$campeonato->id}}">

						<table class="kode_ply_table">
							<tr class="kode_ply_first">
								<th>logo</th>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
							@foreach ($equiposCampeonato as $equipo)
								<tr class="kode_ply_two" data-id="{{$equipo->equipo->id}}">
									<td><img src="/Imagenes/Equipos/{{$equipo->equipo->logo}}" style="height:40px;width: 50px"></td>
									<td>{{$equipo->equipo->nombre}}</td>
									<td>
										<a class="btn btn-danger btn-xs" href="{{url('plantilla_jugadores',['id'=>$equipo->equipo->id,'id_camp'=>$campeonato->id])}}" >Agregar Plantilla&nbsp<span class="fa fa-plus"></span></a>&nbsp&nbsp
									</td>
								</tr>
							@endforeach

						</table>


				</div>
			</div>

		</div>

	</div>



@endsection



