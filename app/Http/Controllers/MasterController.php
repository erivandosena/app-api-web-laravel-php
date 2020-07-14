<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Usuario;
/*
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
*/
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MasterController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dados = $this->model->all();
        //dd($dados);
        //return response()->json($dados); 
        return response()->json($dados, Response::HTTP_OK, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE); 
        //return response(json_encode($dados), Response::HTTP_OK)->header('Content-Type', 'application/json;charset=UTF-8');
        //return response()->json($dados, Response::HTTP_OK);
        
        /*
        if($dados->isEmpty())
            $dados=[];
        */

        //echo "<pre>";
        //print_r($dados);

        //eturn response()->json($dados, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validate($request, $this->model->rules());
        $dataform = $request->all();
        $validator = Validator::make($dataform, $this->model->rules());
        if ($validator->fails()) {
            return response()->json(['erro' => $validator->errors()], Response::HTTP_OK);
        }

        $dados = $this->model->create($dataform);
        //dd($dados);
        /*
        $dados->data_nascimento = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('data_nascimento'));
        $dados->data_nasc_pai = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('data_nasc_pai'));
        $dados->data_nasc_mae = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('data_nasc_mae'));
        $dados->data_nasc_resp = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('data_nasc_resp'));
        $dados->data_cadastro = Carbon::now()->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
        $dados->renda_pai = floatval($request->input('renda_pai'));
        $dados->renda_mae = floatval($request->input('renda_mae'));
        $dados->renda_resp = floatval($request->input('renda_resp'));
        */

        return response()->json($dados, Response::HTTP_CREATED);
        //return response()->json($dados)->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        /*
        return response()->json(;[
            'status' => '403',//sample entry
            'message' => 'ACCOUNT ACTION HAS BEEN DISABLED',//sample message
         ], Response::HTTP_FORBIDDEN)
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$dados =$this->model->find($id)) {
            return response()->json(['erro' => 'Recurso não locaizado.'], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($dados, Response::HTTP_OK);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(!$dados = $this->model->find($id)) {
            return response()->json(['erro' => 'Recurso não locaizado.'], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($dados, Response::HTTP_OK);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$dados = $this->model->find($id)) 
            return response()->json(['erro' => 'Recurso não localizado.'], Response::HTTP_NOT_FOUND);

        $dataform = $request->all();
        $validator = Validator::make($dataform, $this->model->rules($id));
        if ($validator->fails()) {
            return response()->json(['erro' => $validator->errors()], Response::HTTP_OK);
        }

        $dados->update($dataform);
        //return response()->json($dados, ($dados ? Response::HTTP_ACCEPTED : Response::HTTP_NOT_MODIFIED));
        $dados = [
            'status' => ($dados ? Response::HTTP_ACCEPTED : Response::HTTP_NOT_MODIFIED),
            'message' => ($dados ? 'Recurso atualizado.' : 'Recurso não atualizado.'),
        ];
        return response()->json($dados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$dados = $this->model->find($id)) 
            return response()->json(['erro' => 'Recurso não localizado.'], Response::HTTP_NOT_FOUND);

        $dados->delete();
        //return response()->json(['erro' => 'Recurso deletado.'], Response::HTTP_OK);
        $dados = [
            'status' => ($dados ? Response::HTTP_ACCEPTED : Response::HTTP_NOT_MODIFIED),
            'message' => ($dados ? 'Recurso deletado.' : 'Recurso não deletado.'),
        ];
        //return response()->json($dados, ($dados ? Response::HTTP_ACCEPTED : Response::HTTP_NOT_MODIFIED));
        return response()->json($dados);
    }
}
