<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('/', 'HomeController@index')->name('home');
Route::get('perfil', 'UsuariosController@verPerfil');
Route::get('editarperfil/{id}', 'UsuariosController@edit');
Route::get('newpassword', 'UsuariosController@password');
Route::post('updatepassword', 'UsuariosController@updatePassword');
Route::get('reset', 'Auth\AuthController@getPasswordReset');
Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');;
Route::get('reset/{token}', 'Auth\AuthController@showResetForm')->name('password.reset');
Route::post('reset', 'Auth\ResetPasswordController@reset');
Route::get('/listaEquipos','EquipoController@lista');
Route::get('/verJugador/{id}','JugadorController@lista');
Route::get('jugadores_eliminar/{id}', 'JugadorController@eliminar');
Route::get('/fixture/{id}','CampeonatoController@fixture');
Route::get('/plantilla_jugadores/{id}/{id_camp}','CampeonatoController@listar_jugadores');
Route::post('update_equipo', 'CampeonatoController@update_equipo');
Route::get('eliminar_equipo/{id}', 'EquipoController@eliminar');
Route::resource('jugadores','JugadorController');
Route::resource('equipos','EquipoController');
Route::resource('usuarios','UsuariosController');
Route::resource('partidos','PartidoController');
Route::get('partidos/partido_marcadores/{id}', 'PartidoController@marcadores');
Route::get('eliminar_campeoanto/{id}', 'CampeonatoController@eliminar');
Route::get('/goles_jugadores/{partido}/{equipo}', 'PartidoController@goles_jugadores');
Route::get('/goleadores/{id}', 'CampeonatoController@goleadores');
Route::post('guardar_goles_jugadores',  'PartidoController@guardar_goles_jugadores');
Route::resource('campeonatos','CampeonatoController');
Route::get('fase2/{id}','CampeonatoController@partidos_fase2');
Route::get('campeonatos/listar_equipos/{id}', 'CampeonatoController@listar_equipos');
Route::post('campeonato_equipos', 'CampeonatoController@campeonato_equipos');