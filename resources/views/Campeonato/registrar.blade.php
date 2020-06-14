@extends('welcome')
@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>REGISTRO DE CAMPEONATOS</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Registro de Campeonatos</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				
				
				<!--// KODE CONTACT FORM START//----------------------------------------------------------------------------------->
				<div class="kode_contact_form">
					<div class="container">
					<br><br>
					
						<div class="kode_contact_form_hdg">

						</div>

						<div class="row">
							@if (! empty($mensaje))
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Correcto! </strong> {{$mensaje}}   <a href="{{ route('campeonatos.index') }}"> Ir al listado de campeonatos</a>
									</div>
									<br>
								</div>
							@endif
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div id="mensaje"></div>
							</div>
							
							<form method="POST" action="{{ route('campeonatos.store') }}"  role="form" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="col-md-3">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Nombre</b></label>
											<input type="text" class="form-control" id="nombre" name="nombre"  onblur="verificarNombre()" placeholder="Ingresar un nombre" required>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Cantidad de Equipos</b></label>
											<input type="number" class="form-control" id="cant_equipos" min=3 name="cant_equipos" required>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Dias entre Jornadas</b></label>
											<input type="number" class="form-control" id="dias" min=1 name="dias" required>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Fecha de Inicio</b></label>
											<input type="date" name="fecha_inicio" id="fecha_inicio" required min=<?php $hoy=date("Y-m-d"); echo date("Y-m-d",strtotime($hoy."- 1 days")); ?> />
											</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Modalidad</b></label>
											<select class="form-control " style="height: 42px;" name ="modalidad" id="modalidad" required>
												<option value="all">Campeonato</option>
												<option value="group">Copa</option>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="kode_contant_area">
										<button>Limpiar</button>
										<button type="submit">Guardar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--// KODE CONTACT FORM END//-->
				
				<!--// KODE CONTACT SOCIAL START//-->
				<div class="kode_contact_social">
			
					<div class="container">
						<ul class="kode_contact_icon">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
				

        <script>
		function verificarNombre(){
			var nombre = document.getElementById("nombre");
			if(nombre.value.length < 4) {
				mensaje_alerta("El nombre debe contener mínimo 3 carácteres");
			}
		}

		function verificar(){
			var fecha1 = new Date (document.getElementById("fecha_inicio").value);
			var fecha2 = new Date (document.getElementById("fecha_fin").value);
			var cant = document.getElementById("cant_equipos").value;
			var fechaInicio=fecha1.getTime();
			var fechaFin=fecha2.getTime();
			var diff = fechaFin - fechaInicio;
			var dias=(diff/(1000*60*60*24));
			var cant_dias=cant -1;
			if(!fechaInicio | !cant){
				mensaje_alerta(" Debe ingresar la fecha de inicio y la cantidad de equipos");
				document.getElementById("fecha_fin").value = "";
				document.getElementById("cedula").focus();
		
			}else{
				if(fecha2<fecha1){
					mensaje_alerta(" La fecha final debe ser mayor que la de inicio");
					document.getElementById("fecha_fin").value = "";
					document.getElementById("cedula").focus();
				}else {
					if (cant % 2 == 0) {
						if (dias < cant_dias) {
						mensaje_alerta(" Debe ingresar al menos "+ cant_dias +" días");
						document.getElementById("fecha_fin").value = "";
						document.getElementById("cedula").focus();
						} 
					}else {
						if (dias < cant) {
							mensaje_alerta(" Debe ingresar al menos "+ cant +" días");
							document.getElementById("fecha_fin").value = "";
						}
					}
				}
			}
		}
		
		
			
			function mensaje_alerta( mensaje){
		var html = `
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert"></button>
				<strong>Error! </strong> ${mensaje}
			</div>
		`;
		$("#mensaje").html(html);
		$('#mensaje').show().delay(8000).fadeOut('slow');
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}
			
        </script>

	@endsection

