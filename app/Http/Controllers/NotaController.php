<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Nota;

class NotaController extends MasterController
{
    protected $model;

    public function __construct(Nota $nota, Request $request)
    {
        $this->middleware('api');
        $this->model = $nota;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dados = $this->model->paginate(10);
        return response()->json($dados, Response::HTTP_OK, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        //return response()->json($dados, Response::HTTP_OK);
    }

    public function notaCompleta($id)
    {
        if(!$dados = $this->model->with(['boletim','disciplina'])->find($id)) {
            return response()->json(['erro' => 'Recurso não locaizado.'], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($dados, Response::HTTP_OK);
        }
    }

}
