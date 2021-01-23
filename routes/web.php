<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Usuario
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
    Route::get('usuarios',  'UsuarioController@index')->name('index')->middleware('role:admin');
    Route::get('usuarios/novo',  'UsuarioController@create')->name('create')->middleware('role:admin');
    Route::post('usuarios/registra',  'UsuarioController@store')->name('store')->middleware('role:admin');
    Route::get('usuarios/edita/{id}',  'UsuarioController@edit')->name('edit')->middleware('role:admin');
    Route::put('usuarios/atualiza/{id}',  'UsuarioController@update')->name('update')->middleware('role:admin');
    Route::delete('usuarios/exclui/{id}',  'UsuarioController@destroy')->name('destroy')->middleware('role:admin');
});

// Usuario_Permissao
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
Route::get('usuarios/edita/permissao/{id}',  'UsuarioPermissaoController@editUsuarioPermissao')->name('editaUsuarioPermissao')->middleware('role:admin');
Route::post('usuarios/insere/permissao',  'UsuarioPermissaoController@storeUsuarioPermissao')->name('storeUsuarioPermissao')->middleware('role:admin');
Route::delete('usuarios/exclui/permissao/{id}',  'UsuarioPermissaoController@destroyUsuarioPermissao')->name('destroyUsuarioPermissao')->middleware('role:admin');
});

// Usuario_Papel
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
Route::get('usuarios/edita/papel/{id}',  'UsuarioPapelController@editUsuarioPapel')->name('editaUsuarioPapel')->middleware('role:admin');
Route::post('usuarios/insere/papel',  'UsuarioPapelController@storeUsuarioPapel')->name('storeUsuarioPapel')->middleware('role:admin');
Route::delete('usuarios/exclui/papel/{id}',  'UsuarioPapelController@destroyUsuarioPapel')->name('destroyUsuarioPapel')->middleware('role:admin');
});

//Aluno
Route::group(['prefix' => '/', 'middleware' => 'auth'], function($router) {
    Route::get('alunos/{codigo_escola}',  'AlunoController@listaTodosAlunos')->name('listaAlunos')->middleware('role:admin');
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
