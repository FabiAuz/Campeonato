@extends('welcome')

@section('contenido')

    <!--// KODE BENNER1 START //-->
    <div class="kode_benner1 bamnner2">
        <div class="kode_benner1_text">
            <h2>REGISTRO DE JUGADORES</h2>
        </div>
        <div class="kode_benner1_cols">
            <div class="container kf_container">
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Nuevo Jugador</li>
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
                <form id="form" method="POST" action="{{ route('jugadores.store') }}"  role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
					<div class="row">
                            @if (! empty($mensaje))
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="success-alert" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Correcto! </strong> {{$mensaje}}
                                </div>
                                <br>
                            </div>
                            @endif
							
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div id="mensaje"></div>
							</div>
							
                    <div class="col-md-4">
                        <div class="custom-file">
                            <label for="formGroupExampleInput"><b>Elegir Foto</b></label>
                            <input type="file" class="filestyle"  data-text="Foto" data-placeholder="Escoger Foto" data-btnClass="btn-danger" id="imagen" name="imagen"  accept=".png, .jpeg, .jpg" required>


                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Nombre</b></label>
                                <input type="text" class="form-control" id="cedula" onchange="verificarCedula(this.value)" name="cedula" placeholder="Ingrese cedula" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Nombres</b></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Apellidos</b></label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese apellido" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Fecha de Nacimiento</b></label>
                                <input type="date" class="form-control" id="fecha_nac" min="1968-01-01" name="fecha_nac" placeholder="Ingrese fecha" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Nacionalidad</b></label>
                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Ingrese Nacionalidad" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Ciudad</b></label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese Ciudad" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Estatura</b></label>
                                <input type="number" class="form-control" id="estatura" name="estatura"  min="1.50" max="10" step="0.01" value="1.50" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Número</b></label>
                                <input type="number" class="form-control" id="numero" name="numero" min="1" max="99" step="1" required >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Posición</b></label>
                                <select class="form-control " style="width: 100%;"  name ="posicion" id="posicion" required>
                                    <option value="Arquero">Arquero</option>
                                    <option value="Defensa">Defensa</option>
                                    <option value="Delantero">Delantero</option>
                                    <option value="Volante">Volante</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Estado</b></label>
                                <select class="form-control " style="width: 100%;"  name ="tipo" id="tipo" required>
                                    <option value="Titular">Títular</option>
                                    <option value="Suplente">Suplente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Equipo</b></label>
                                <select class="form-control " style="width: 100%;"  name ="equipo_id" id="equipo_id" required>
									@foreach ($equipos as $equipo)
                                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
									@endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Descripcion</b></label>
                                <textarea  class="form-control" id="descripcion" name="descripcion"  placeholder="Direccion" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="kode_contant_area">
                            <button onclick="limpiar()">Limpiar</button>
                            <button type="submit">Guardar</button>
                        </div>
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



 function limpiar() {
	 $('#form')[0].reset();
 }
function verificarCedula(cedulaN) {
  var cedula = cedulaN;
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      return true;
    }
    else
    {
      mensaje_alerta("La cédula no es válida");
	  document.getElementById("cedula").value="";
	  document.getElementById("cedula").focus();
      return false;
    }
  }
  else
  {
	mensaje_alerta("Ingrese 10 Numeros y no caracteres alfabeticos");
	document.getElementById("cedula").value="";
	document.getElementById("cedula").focus();
    return false;
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