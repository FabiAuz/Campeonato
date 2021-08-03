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
							{!! Form::model($equipo, ['method'=>'PATCH', 'route'=> ['equipos.update',$equipo->id]]) !!}
							{{csrf_field()}}

								<div class="col-md-4">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Nombre</b></label>
											<input type="text" class="form-control" id="nombre" name="nombre" value="{{$equipo->nombre}}">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Fecha de creacion</b></label>
											<input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{$equipo->fecha_creacion}}">
										</div>
									</div>
								</div>



								<div class="col-md-4">
										<div class="kode_contant_field">
											<div class="form-group">
												<label for="formGroupExampleInput"><b>Propietario</b></label>
												<input type="text" class="form-control" id="propietario" name="propietario" value="{{$equipo->propietario}}">
											</div>
										</div>
								</div>
									<div class="col-md-4">
										<div class="kode_contant_field">
											<div class="form-group">
												<label for="formGroupExampleInput"><b>Logo</b></label>
												<input type="text" class="form-control" id="logo" name="logo" value="{{$equipo->logo}}">
											</div>
										</div>
									</div>
								<div class="col-md-4">
									<div class="kode_contant_field">
										<div class="form-group">
											<label for="formGroupExampleInput"><b>Descripcion</b></label>
											<textarea  class="form-control" id="descripcion" name="descripcion"  value="{{$equipo->descripcion}}"></textarea>
												</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="kode_contant_area">
										<button>Limpiar</button>
										<button type="submit">Guardar</button>
									</div>
								</div>
							{!! Form::close() !!}
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


	@endsection

