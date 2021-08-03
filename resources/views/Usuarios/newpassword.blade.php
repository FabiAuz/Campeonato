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
                    <li class="active">Actualizar Password</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// KODE BENNER1 END //-->



    @if (Session::has('message'))
        <div class="text-danger">
            {{Session::get('message')}}
        </div>
    @endif





    <div class="kode_contact_form">
        <div class="container">
            <br><br><br>

            <div class="kode_contact_form_hdg">

            </div>
            <div class="row">
            <form method="post" action="{{url('updatepassword')}}">
                {{csrf_field()}}

            <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label id ="label-dni" for ="identificacion">Password Actual:</label>
                            <input type="password" name="mypassword" class="form-control">
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label id ="label-dni" for ="identificacion">Password Nuevo:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label id ="label-dni" for ="identificacion">Confirmacion de Password:</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                </div><!--Fin de row -->








            <div class="box-footer col-xs-12 ">
                <button type="submit" class="btn btn-primary">Cambiar mi password</button>
            </div>

            </form>

            </div>
        </div>

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
    </div>


@endsection

