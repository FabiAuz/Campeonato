@extends('welcome')

@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>REGISTRO DE EQUIPOS</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Registro de equipos</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				
				
				<!--// KODE CONTACT FORM START//----------------------------------------------------------------------------------->
				<div class="kode_contact_form">
					<div class="container">
					<br><br><br>
					
						<div class="kode_contact_form_hdg">
							
						</div>

						<div class="row">
							<form method="POST" action="{{ route('equipos.store') }}"  role="form" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="col-md-4">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="logo" name="logo">
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
								</div>


								<div class="col-md-4">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Nombre</b></label>
											<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre del equipo">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Fecha de creacion</b></label>
											<input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion">
										</div>
									</div>
								</div>



								<div class="col-md-4">
										<div class="kode_contant_field">
											<div class="form-group">
												<label for="formGroupExampleInput"><b>Director Técnico</b></label>
												<input type="text" class="form-control" id="propietario" name="propietario">
											</div>
										</div>
								</div>

								<div class="col-md-4">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Descripcion</b></label>
											<textarea  class="form-control" id="descripcion" name="descripcion"  placeholder="Example input"></textarea>
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



	@endsection

