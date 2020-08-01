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

Route::get('/demo', function () {
    return view('demo');
});

Route::middleware('auth')->get('home', 'PrincipalController@index')->name('home');

Auth::routes(); /* Auth::routes(['register' => false]); */

//Aluno
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
    Route::get('alunos/{codigo_escola}',  'AlunoController@listaTodosAlunos')->name('listaAlunos');
    Route::get('alunos/edita/{cod_alun}',  'AlunoController@editaCadastroAluno')->name('editaAluno');
    Route::put('alunos/atualiza/{cod_alun}',  'AlunoController@atualizaCadastroAluno')->name('atualizaAluno');
    Route::delete('alunos/exclui/{cod_alun}',  'AlunoController@excluiCadastroAluno')->name('excluiAluno');
});

//Escola
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
    Route::get('escola/{id}', 'EscolaController@showCadastroEscola')->name('editaEscola');
});

//Matricula
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
    Route::get('matriculas_aluno/{nome_ou_matricula}',  'MatriculaController@listaMatriculas')->name('matriculasAluno');
    Route::get('matriculas',  'MatriculaController@listaTodasMatriculas')->name('matriculasGeral');
});

//Boletim
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
    Route::get('boletim/{id}', 'BoletimController@boletimNotas')->name('boletimEscolar');
});
