@extends('welcome')

@section('contenido')

    <!--// KODE BENNER1 START //-->
    <div class="kode_benner1 bamnner2">
        <div class="kode_benner1_text">
            <h2>AGREGAR USUARIOS</h2>
        </div>
        <div class="kode_benner1_cols">
            <div class="container kf_container">
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Agregar Usuarios</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// KODE BENNER1 END //-->



    @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            <p><strong>Error!! </strong>Corrija los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>

        </div>
    @endif


    <div class="kode_contact_form">
        <div class="container">
  

            <div class="kode_contact_form_hdg">

            </div>
            <div class="row">
                {!! Form::open(['route' => 'usuarios.store','method'=>'POST']) !!}

                <input type="hidden" class="form-control"  id ="id" name="id"   value="">

                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Cedula</b></label>
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese cedula" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Nombres</b></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return soloLetras(event)" placeholder="Ingrese nombre">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Apellidos</b></label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required onkeypress="return soloLetras(event)" placeholder="Ingrese apellido">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese email">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Password</b></label>
                            <input type="password" class="form-control" id="password"  required name="password" placeholder="Ingrese Password">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Rol</b></label>
                            <select class="form-control " style="width: 100%;"  name ="rol">
                                <option value="admin">Administrador</option>
                                <option value="usuario">Usuario </option>
                            </select>
                        </div>
                    </div>
                </div>
					<div class="col-md-12">
									<div class="kode_contant_area">
										<button >Limpiar</button>
										<button type="submit">Guardar</button>
									</div>
					</div>
			
                
                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection

@section('script')

    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>



@endsection


