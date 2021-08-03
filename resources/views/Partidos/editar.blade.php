@extends('welcome')

@section('contenido')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Editar partido</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="#">Inicio</a></li>
							  <li class="active">Editar Partido</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                        <br><br>
				<div class="kode_ticket_sig_row">
					<ul>
						<li>
							<div class="kode_ticket_sig_fig">
								<figure>
									<img src="/Imagenes/Equipos/{{ $equipo1->logo}}" style="height: 150px;width: 250px" alt="">
								</figure>
								<h4>{{$equipo1->nombre}}</h4>
							</div>
						</li>
						<li>
							<div class="kode_ticket_sig_fig fig_2">
								<span>VS</span>

							</div>
						</li>
						<li>
							<div class="kode_ticket_sig_fig">
								<figure>
									<img  src="/Imagenes/Equipos/{{ $equipo2->logo}}"style="height: 150px;width: 250px" alt="">
								</figure>
								<h4>{{$equipo2->nombre}}</h4>
							</div>
						</li>
					</ul>
            </div>



                {!! Form::model($partido, ['method'=>'PATCH', 'route'=> ['partidos.update',$partido->id]]) !!}
                {{csrf_field()}}
                    <div class="col-md-3">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Fecha</b></label>
                                <input type="date" name="fecha" id="fecha" value={{$partido->fecha}} required min=<?php $hoy=date("Y-m-d"); echo date("Y-m-d",strtotime($hoy."- 1 days")); ?> />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Hora</b></label>
                                <input type="time" class="form-control" id="hora"  name="hora" required value={{$partido->hora}} >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Arbitro</b></label>
								<select class="form-control " style="height: 42px;" name ="arbitro" id="arbitro"  required>
                                    <option value="Enrique Cáceres">Enrique Cáceres</option>
                                    <option value="Andrés Cunha">Andrés Cunha</option>
									<option value="Néstor Pitana">Néstor Pitana</option>
									<option value="Andrés Cunha">Andrés Cunha</option>
									<option value="Sandro Ricci">Sandro Ricci</option>
									<option value="Wilmar Roldán">Wilmar Roldán</option>
									<option value="Pau Cebrián">Pau Cebrián</option>
									<option value="Nicolas Danos">Nicolas Danos</option>
									<option value="Elenito di Liberatore">Elenito di Liberatore</option>
									<option value="Mark Borsch">Mark Borsch</option>
									<option value="Anton Averianov">Anton Averianov</option>
									<option value="Dalibor Djurdjevic">Dalibor Djurdjevic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Estadio</b></label>
                                <select class="form-control " style="height: 42px;" name ="estadio_id" id="estadio_id"  required>
								
									
                                    @foreach($estadios as $estadio)
									@if($partido->estadio!="")
                                    <option selected value={{$partido->estadio->id}} >{{$partido->estadio->nombre}}</option>
									@endif
                                    <option value={{$estadio->id}}>{{$estadio->nombre}}</option>
                                    @endforeach
									
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="kode_contant_area">
                            <button>Regresar</button>
                            <button type="submit">Modificar</button>
                        </div>
                    </div>
                {!! Form::close() !!}

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

</script>


	@endsection

