@extends('welcome')
@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Registro de Goles</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Registro de Goles</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				
				
				<!--// KODE CONTACT FORM START//----------------------------------------------------------------------------------->
			<div class="kode_contact_form">
					<div class="container">
					<br><br>
                        <div class="heading5 black margin">
                            <h4>Jugadores del Equipo <span>{{$equipo->nombre}}</span></h4>
                        </div>
						
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="kode_ticket_standerd_detail">
								<form method="POST" action="{{url('guardar_goles_jugadores')}}" id="goles">
								{{ csrf_field() }}
										<input  style="visibility:hidden;" type="text" name="id_partido" id="id_partido" value="{{$partido}}">
										
										<input  style="visibility:hidden;" type="text" name="id_equipo" id="id_equipo" value="{{$equipo->id}}">
										
									<?php $gol = 0; $total = 1000; $lista=array(); $uno=""?>
									@foreach ($jugadores as $jugador)
										<?php $gol = $gol +1; $total = $total +1; $lista[$gol]=$jugador->id; ?>
									
									<ul>
										<li>
											<div class="row">
												<div class="col-md-4" style="padding-top: 15px;">
													<div class="kode_satnderd_text">
														
														<div class="kode_standerd_title">

															<h4><i class="fa fa-user"></i> {{$jugador->nombre}}</h4>
															<p>{{$jugador->posicion}}</p>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="kode_standerd_select">
														<h2 class="demoHeaders">Goles:</h2>
														<input type="number" style="border: 1px solid #4d5052;padding-left: 5px;width: 80px;height: 27px;background-color: #32373b;"min=1 id={{$gol}}>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<button type="button" class="kode_stand_btn" onclick="sumar('{{$gol}}','{{$total}}')" style="margin-top:28px"><i class="glyphicon glyphicon-ok-sign"></i></button>
														<button type="button" class="kode_stand_btn" onclick="restar('{{$gol}}','{{$total}}')"style="margin-top:28px"><i class="glyphicon glyphicon-remove-sign"></i> </button>
													</div>
												</div>
												
												<div class="col-md-2">
													<h4 style="color: #ffffff;margin-top:40px ">Total: <span><b><input readonly style="margin-left: 5px; width: 52px; border: 1px solid #23272a; background:#23272a;"value="0" id={{$total}} name={{$total}} /></b></span></h4>
												</div>
											</div>
										</li>
									</ul>
									
									<input  style="visibility:hidden;"  type="text" name="lista[]"  value=<?php echo $lista[$gol]?>>
									@endforeach
									<div class="row">
												<div class="col-sm-8 col-md-offset-1">
													<div class="kode_contant_area">
													<button onclick="recargar()">Limpiar</button>
														<button type="submit">Guardar</button>
														
													</div>
												</div>
												
												<div class="col-md-3">
													<h4 style=";margin-top:10px;">Goles del equipo: <b><input readonly style=" width: 52px; border: 0px;" value="0"  id="totales" name="totales"/></b></h4>
												</div>
											</div>
								</form>
											
										
								
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
			</div>

	
	<script>
	
	function recargar(){
		location.reload();
	}
	function sumar(gol,total){
		var goles = document.getElementById(gol).value;
        var tot = document.getElementById(total).value;
        var total_goles = document.getElementById("totales").value;

        if (goles != "") {
            var suma = parseInt(goles) + parseInt(tot);
            var total_equipo = parseInt(total_goles) + parseInt(goles);
            document.getElementById(total).value = suma;

            document.getElementById("totales").value = total_equipo;
            document.getElementById(gol).value = "";


        } else {
            alert("Debe ingresar la cantidad de goles");
            document.getElementById(gol).focus();
        }
    }

	function restar(gol,total){
		var goles = document.getElementById(gol).value;
		var tot=document.getElementById(total).value;
        var total_goles = document.getElementById("totales").value;

		if(goles==""){
			alert("Debe ingresar la cantidad de goles");
            document.getElementById(gol).focus();
		}else{
			if (tot==0){
				alert("El total de goles es 0 no se pueden eliminar");
			}else{
				if(goles>tot){
					alert("El total de goles es menor que los ingresados");
				}else{
					var total_equipo= parseInt(total_goles)- parseInt(goles);
					var resta=parseInt(tot)-parseInt(goles);
					document.getElementById(total).value=resta;
					document.getElementById(gol).value="";
					document.getElementById("totales").value=total_equipo;
				}
			}
		}
	}
	</script>
				
	@endsection