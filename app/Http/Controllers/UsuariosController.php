<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Validator;
use Auth;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }

*/
    public function verPerfil(){

        return view('Usuarios.perfil');
    }

    public function edit($id){
        $usuario= User::find($id);
        return View('Usuarios.editar',compact('usuario'));
    }

    public function password(){
        return View('Usuarios.newpassword');
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('newpassword')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                    ->update(['password' => bcrypt($request->password)]);
                return redirect('/');
            }
            else
            {
                return redirect('administracion/newpassword');
            }
        }
    }

    public function update($id,Request $request){
        $data = $request;
        $user= User::find($id);
        $user->id = $data['id'];
        $user->cedula = $data['cedula'];
        $user->nombre = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->rol = $data['rol'];
        $user->email = $data['email'];
        if($user->save()){
            return redirect('perfil')->with('message','store');
        }
    }
    public function store(Request $request)
    {
        User::create([
            'id'=>$request['id'],
            'name' =>$request['nombre'],
            'email' => $request['email'],
            'password' =>bcrypt($request['password']),
            'cedula' => $request['cedula'],
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'rol' => $request['rol'],
        ]);
        return redirect('/')->with('message','store');

    }

    public function index(){

        return View('Usuarios.registrar');
    }


}
