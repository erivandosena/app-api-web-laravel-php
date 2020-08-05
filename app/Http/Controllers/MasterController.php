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
use App\Http\Controllers\Controller;


class MasterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $dados = $this->model->all();
        return response()->json($dados, Response::HTTP_OK, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
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
        $dataform = $request->all();

        $dataform['data_cadastro'] = Carbon::now()->format('Y-m-d H:i:s');
        if(!empty($request->input('data_nascimento')))
            $dataform['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_pai')))
            $dataform['data_nasc_pai'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_pai'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_mae')))
            $dataform['data_nasc_mae'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_mae'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_resp')))
            $dataform['data_nasc_resp'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_resp'))->format('Y-m-d');
        if(!empty($request->input('renda_pai')))
            $dataform['renda_pai'] = floatval($request->input('renda_pai'));
        if(!empty($request->input('renda_mae')))
            $dataform['renda_mae'] = floatval($request->input('renda_mae'));
        if(!empty($request->input('renda_resp')))
            $dataform['renda_resp'] = floatval($request->input('renda_resp'));

        $validator = Validator::make($dataform, $this->model->rules());
        if ($validator->fails()) {
            return response()->json(['erro' => $validator->errors()], Response::HTTP_OK);
        }

        $dados = $this->model->create($dataform);

        return response()->json($dados, Response::HTTP_CREATED);
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

        if(!empty($request->input('data_nascimento')))
            $dataform['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_pai')))
            $dataform['data_nasc_pai'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_pai'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_mae')))
            $dataform['data_nasc_mae'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_mae'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_resp')))
            $dataform['data_nasc_resp'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_resp'))->format('Y-m-d');
        if(!empty($request->input('renda_pai')))
            $dataform['renda_pai'] = floatval($request->input('renda_pai'));
        if(!empty($request->input('renda_mae')))
            $dataform['renda_mae'] = floatval($request->input('renda_mae'));
        if(!empty($request->input('renda_resp')))
            $dataform['renda_resp'] = floatval($request->input('renda_resp'));

        $validator = Validator::make($dataform, $this->model->rules($id));
        if ($validator->fails()) {
            return response()->json(['erro' => $validator->errors()], Response::HTTP_OK);
        }

        $dados->update($dataform);

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

        return response()->json($dados);
    }
}
