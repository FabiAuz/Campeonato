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
                    <li class="active">Perfil de  Usuarios</li>
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


                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Cedula</b></label>
                            <div class="profile-info-value">
                                <i class="fa fa-barcode  light-orange bigger-110"></i>
                                &nbsp {!! Auth::user()->cedula !!}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Nombres</b></label>
                            <div class="profile-info-value">
                                <i class="fa fa-user  light-orange bigger-110"></i>
                                &nbsp {!! Auth::user()->nombre !!}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Apellidos</b></label>
                            <div class="profile-info-value">
                                <i class="fa fa-user  light-orange bigger-110"></i>
                                &nbsp {!! Auth::user()->apellido !!}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <label for="formGroupExampleInput"><b>Email</b></label>
                        <div class="profile-info-value">
                            <i class="fa fa-email  light-orange bigger-110"></i>
                            &nbsp {!! Auth::user()->email !!}

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="kode_contant_field">
                        <div class="form-group">
                            <label for="formGroupExampleInput"><b>Rol</b></label>
                            <div class="profile-info-value">
                                <i class="fa fa-user  light-orange bigger-110"></i>
                                &nbsp {!! Auth::user()->rol !!}

                            </div>
                        </div>
                    </div>
                </div>



                                        <a href="{{url ('editarperfil/'.Auth::user()->id.'')}}" class="btn btn-primary">Editar  Perfil</a>


            </div>
        </div>
    </div>


@endsection
