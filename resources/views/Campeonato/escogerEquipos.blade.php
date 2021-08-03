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


			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form method="POST" action="{{url('campeonato_equipos')}}" >
					{{ csrf_field() }}
						<input  style="visibility:hidden;" type="text" name="id_campeonato" id="id_campeonato" value="{{$campeonato->id}}">

						<table class="kode_ply_table">
							<tr class="kode_ply_first" >
								<th>logo</th>
								<th>Nombre</th>
								<th>Fecha de creacion</th>
								<th>Propietario</th>
								<th>Acciones</th>
							</tr>
							@foreach ($equipos as $equipo)
								<tr class="kode_ply_two" data-id="{{$equipo->id}}" >
                                    <td><img src="/Imagenes/Equipos/{{$equipo->logo}}" style="height:30px;width: 40px"></td>
									<td>{{$equipo->nombre}}</td>
									<td>{{$equipo->fecha_creacion}}</td>
									<td>{{$equipo->propietario}}</td>
									<td> <input style="width: 20px;height: 20px;" type="checkbox"  name="lista[]" onchange="nom()" value="{{$equipo->id}}">
									</td>
								</tr>
							@endforeach

						</table>
						<div class="col-md-12">
							<div class="kode_contant_area">
								<button type="button" onclick="recargar()">Limpiar</button>
								<button id="bb" type="submit"  disabled >Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<br>
		


	<script>
	function recargar(){
		var cf = document.getElementsByName('lista');
	
		alert(cf.length);

	}
        function nom() {

            var contador=0;
            // Recorremos todos los checkbox para contar los que estan seleccionados
            $("input[type=checkbox]").each(function(){
                if($(this).is(":checked"))
                    contador++;
            });
            var cant_equi={{$campeonato->cant_equipos}};


            if(contador==cant_equi) {
                $('#bb').attr("disabled", false);
            }
            else if (contador>cant_equi) {
                swal("Usted a marcado mas equipos que lo permitido, desmarque uno!");
                $('#bb').attr("disabled", true);
            }else if (contador<cant_equi) {
				
                $('#bb').attr("disabled", true);
            }

        }

	</script>
@endsection

