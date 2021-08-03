@extends('welcome')



@section('contenido')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
    <div class="login-logo">
        <b><font face="verdana" color="white" size="5">Recuperar Password</font></b>

    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <div align="center">
            <img class="img-circle" id="img_logo" src="{{url('frontend/images/pag2.png')}}">
        </div>


        <form  role="form" method="POST" action="{{ url('/email') }}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group has-feedback">
                <label>Email</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" >
                </div>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>Se necesita que ingrese el Correo electronico</strong>
                                    </span>
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <center>
                        <button type="submit" class="btn btn-primary">Recuperar Clave</button>

                    </center>
                </div><!-- /.col -->
            </div>
        </form>




    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
    </div>

 <br>
    <br>
@endsection
