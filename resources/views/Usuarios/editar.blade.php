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
                    <li class="active">Editar Perfil</li>
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
            <br><br><br>

            <div class="kode_contact_form_hdg">

            </div>
            <div class="row">
                {{Form::model($usuario, ['route' => ['usuarios.update',$usuario->id],'method'=>'PUT', 'id'=>'formdata','files' => true, ])}}


                <input type="hidden" class="form-control"  id ="id" name="id"   value="{{$usuario->id }}">

                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Cedula</b></label>
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese cedula" required value="{{$usuario->cedula }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Nombres</b></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return soloLetras(event)" placeholder="Ingrese nombre" value="{{$usuario->nombre }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Apellidos</b></label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required onkeypress="return soloLetras(event)" placeholder="Ingrese apellido" value="{{$usuario->apellido }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese email" value="{{$usuario->email }}">
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Rol</b></label>
                            <select class="form-control " name ="rol">
                                @if($usuario->rol=="admin")
                                    <option value="admin" selected>{{ $usuario->rol }}</option>
                                    <option value="usuario">Usuario</option>
                                @elseif($usuario->sexo_pac=="Femenino")
                                    <option value="admin" >Administrador </option>
                                    <option value="usuario" selected>{{ $usuario->rol }}</option>
                                @endif

                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b></b></label>
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}

                        </div>
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
