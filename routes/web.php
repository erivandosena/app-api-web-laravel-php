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

Route::get('/principal', 'PrincipalController@index')->name('principal');

Route::get('/boletim/{id}', 'BoletimController@boletimNotas')->name('boletimEscolar');

Route::get('/matriculas_aluno/{nome_ou_matricula}', 'MatriculaController@listaMatriculas')->name('matriculasAluno');

Route::get('/matriculas', 'MatriculaController@listaTodasMatriculas')->name('matriculasGeral');
