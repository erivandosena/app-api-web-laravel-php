<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/boletim/{id}', 'BoletimController@boletimNotas')->name('boletimEscolar')->middleware('auth');;

Route::get('/matriculas_aluno/{nome_ou_matricula}', 'MatriculaController@listaMatriculas')->name('matriculasAluno')->middleware('auth');;

Route::get('/matriculas', 'MatriculaController@listaTodasMatriculas')->name('matriculasGeral')->middleware('auth');;

// Auth::routes(['register' => false]);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'PrincipalController@index')->name('home')->middleware('auth');
