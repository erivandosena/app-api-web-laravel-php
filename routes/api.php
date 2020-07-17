<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// User
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');
});

//Aluno
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('aluno/lista', 'AlunoController');
    Route::get('aluno/{id}', 'AlunoController@show');
    Route::post('aluno/insere', 'AlunoController@store');
    Route::put('aluno/atualiza/{id}', 'AlunoController@update');
    Route::delete('aluno/exclui/{id}', 'AlunoController@destroy');
});

//Curso
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('curso/lista', 'CursoController');
    Route::get('curso/{id}', 'CursoController@show');
    Route::post('curso/insere', 'CursoController@store');
    Route::put('curso/atualiza/{id}', 'CursoController@update');
    Route::delete('curso/exclui/{id}', 'CursoController@destroy');
});

//Serie
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('serie/lista', 'SerieController');
    Route::get('serie/{id}', 'SerieController@show');
    Route::post('serie/insere', 'SerieController@store');
    Route::put('serie/atualiza/{id}', 'SerieController@update');
    Route::delete('serie/exclui/{id}', 'SerieController@destroy');
});

//Turno
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('turno/lista', 'TurnoController');
    Route::get('turno/{id}', 'TurnoController@show');
    Route::post('turno/insere', 'TurnoController@store');
    Route::put('turno/atualiza/{id}', 'TurnoController@update');
    Route::delete('turno/exclui/{id}', 'TurnoController@destroy');
});

//Turma
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('turma/lista', 'TurmaController');
    Route::get('turma/{id}', 'TurmaController@show');
    Route::post('turma/insere', 'TurmaController@store');
    Route::put('turma/atualiza/{id}', 'TurmaController@update');
    Route::delete('turma/exclui/{id}', 'TurmaController@destroy');
});

//Letivo
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('letivo/lista', 'LetivoController');
    Route::get('letivo/{id}', 'LetivoController@show');
    Route::post('letivo/insere', 'LetivoController@store');
    Route::put('letivo/atualiza/{id}', 'LetivoController@update');
    Route::delete('letivo/exclui/{id}', 'LetivoController@destroy');
});

//Matricula
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('matricula/lista', 'MatriculaController');
    Route::get('matricula/{id}', 'MatriculaController@show');
    Route::post('matricula/insere', 'MatriculaController@store');
    Route::put('matricula/atualiza/{id}', 'MatriculaController@update');
    Route::delete('matricula/exclui/{id}', 'MatriculaController@destroy');
    // Relacoes
    Route::get('/matricula/{id}/completo', 'MatriculaController@matriculaCompleta');
});

//Disciplina
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('disciplina/lista', 'DisciplinaController');
    Route::get('disciplina/{id}', 'DisciplinaController@show');
    Route::post('disciplina/insere', 'DisciplinaController@store');
    Route::put('disciplina/atualiza/{id}', 'DisciplinaController@update');
    Route::delete('disciplina/exclui/{id}', 'DisciplinaController@destroy');
});

//Boletim
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('boletim/lista', 'BoletimController');
    Route::get('boletim/{id}', 'BoletimController@show');
    Route::post('boletim/insere', 'BoletimController@store');
    Route::put('boletim/atualiza/{id}', 'BoletimController@update');
    Route::delete('boletim/exclui/{id}', 'BoletimController@destroy');
    // Relacoes
    Route::get('boletim/{id}/completo', 'BoletimController@boletimCompleto');
    Route::get('boletim/{id}/notas', 'BoletimController@boletimNotas');
});

//Nota
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('nota/lista', 'NotaController');
    Route::get('nota/{id}', 'NotaController@show');
    Route::post('nota/insere', 'NotaController@store');
    Route::put('nota/atualiza/{id}', 'NotaController@update');
    Route::delete('nota/exclui/{id}', 'NotaController@destroy');
    //Nota
    Route::get('nota/{id}/completo', 'NotaController@notaCompleta');
});

//Escola
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('escola/lista', 'EscolaController');
    Route::get('escola/{id}', 'EscolaController@show');
    Route::post('escola/insere', 'EscolaController@store');
    Route::put('escola/atualiza/{id}', 'EscolaController@update');
    Route::delete('escola/exclui/{id}', 'EscolaController@destroy');
});

//Usuario
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::apiResource('usuario/lista', 'UsuarioController');
    Route::get('usuario/{id}', 'UsuarioController@show');
    Route::post('usuario/insere', 'UsuarioController@store');
    Route::put('usuario/atualiza/{id}', 'UsuarioController@update');
    Route::delete('usuario/exclui/{id}', 'UsuarioController@destroy');
});
