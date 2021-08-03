<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{



    protected function getLogin(){
        return view("/");
    }

    public function postLogin(Request $request) {
        // dd($request->all());

        $this->validate($request, [
            'email' => [ 'required' ],
            'password' => [ 'required' ],
        ]);
        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('home')->with('success','Acceso Exitoso');
        } else {
            return redirect()->route('home')->with('success','Acceso Incorrecto');
        }

    }

    protected function getPasswordReset(){
        return view('Usuarios.email');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('Usuarios.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    protected function getLogout(){
        Auth::logout();

        Session::flush();

        return redirect('/');
    }




}