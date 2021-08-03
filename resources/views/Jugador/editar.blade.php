@extends('welcome')

@section('contenido')

    <!--// KODE BENNER1 START //-->
    <div class="kode_benner1 bamnner2">
        <div class="kode_benner1_text">
            <h2>EDITAR JUGADORES</h2>
        </div>
        <div class="kode_benner1_cols">
            <div class="container kf_container">
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Editar Jugador</li>
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

                {!! Form::model($jugador, ['method'=>'PATCH', 'route'=> ['jugadores.update',$jugador->id]]) !!}
                    {{csrf_field()}}
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Cedula</b></label>
                                <input type="text" class="form-control" id="cedula" name="cedula" value="{{$jugador->cedula}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Nombres</b></label>
                                <input type="text" class="form-control" id="nombre" name="nombre"  value="{{$jugador->nombre}}">
                            </div>
                        </div>`
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Apellidos</b></label>
                                <input type="text" class="form-control" id="apellido" name="apellido"  value="{{$jugador->apellido}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Fecha de Nacimiento</b></label>
                                <input type="text" class="form-control" id="fecha_nac" name="fecha_nac"  value="{{$jugador->fecha_nac}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Sexo</b></label>
                                <input type="text" class="form-control" id="sexo" name="sexo" value="{{$jugador->sexo}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kode_contant_field">
                            <div class="form-group">
                                <label for="formGroupExampleInput"><b>Estatura</b></label>
                                <input type="text" class="form-control" id="estatura" name="estatura"  value="{{$jugador->estatura}}">
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

@endsection

