@extends('welcome')
@section('contenido')

	<!--// KODE BENNER1 START //-->
	<div class="kode_benner1 bamnner2">
		<div class="kode_benner1_text">
			<h2>JUGADORES DEL EQUIPO {{$equipo->nombre}} </h2>
		</div>
		<div class="kode_benner1_cols">
			<div class="container kf_container">
				<ul class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li class="active">Campeonatos</li><li class="active">Equipos</li><li class="active">Agregar jugadores</li>
				</ul>
			</div>
		</div>
	</div>
	<!--// KODE BENNER1 END //-->

	<!--// KODE CONTACT SOCIAL START//-->


	<div class="kode_ply_gallery">
		<div class="container">
			<div class="heading5 black b_2">
				<h4>Seleccion de jugadores para el campeonato</b></h4>
			</div>

			<div class="row">
				<div class="col-md-6 col-md-offset-3">


					<form method="POST" action="{{url('update_equipo')}}" >
						{{ csrf_field() }}
						<input  style="visibility:hidden;" type="text" name="id_campeonato" id="id_campeonato" value="{{$id_camp}}">

						<table class="kode_ply_table">
							<tr class="kode_ply_first">
								<th>Jugador</th>
								<th>Posicion</th>
								<th>Seleccionar</th>
							</tr>
							@foreach ($jugadores as $equipo)
								<tr class="kode_ply_two" data-id="{{$equipo->id}}">
									<td>{{$equipo->jugador->nombre}}</td>
									<td>{{$equipo->jugador->posicion}}</td>

									<td> <input style="width: 20px;height: 20px;" type="checkbox" name="lista[]" onchange="nom()" value="{{$equipo->jugador_id}}">
									</td>
								</tr>
							@endforeach

						</table>
						<div class="col-md-12">
							<div class="kode_contant_area">
								<button  type="submit"   >Guardar Plantilla</button>

							</div>
						</div>
					</form>
				</div>
			</div>


		</div>

	</div>

	<script >
        function nom() {

            var contador=0;
            // Recorremos todos los checkbox para contar los que estan seleccionados
            $("input[type=checkbox]").each(function(){
                if($(this).is(":checked"))
                    contador++;
            });

            if(contador==11) {
                $('#bb').attr("disabled", false);
            }
            else if (contador>11) {
                alert("Has seleccionado mas checkbox que los indicados");
                $('#bb').attr("disabled", true);
            }else if (contador<11) {
                $('#bb').attr("disabled", true);
            }

        }

	</script>

@endsection


