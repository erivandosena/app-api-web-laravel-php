<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends MasterController
{
    protected $model;

    public function __construct(Usuario $usuario, Request $request)
    {
        $this->model = $usuario;
        $this->request = $request;
    }

    public function index() {
        $dados = DB::table('usuarios')
        ->select('usuarios.*', 'escolas.nome_fantasia')
        ->join('escolas','escolas.cod_esco','usuarios.cod_esco')
        ->orderByDesc('usuarios.name')
         ->paginate(25);

        if($dados->isEmpty())
            $dados=[];

        return view('listaUsuarios', compact('dados'));
    }

    public function create()
    {
        return view('registraUsuario');
    }

    public function store(Request $request)
    {
        $dataform = $request->all();
        $validator = Validator::make($dataform, $this->model->rules());

        Usuario::create(array_merge(
            $validator->validated(),
            ['password' => Hash::make($request->password)]
        ));

        return redirect('usuarios')->with('success', 'Cadastrado com sucesso!');
    }

    public function edit($id) {
        $usuario = $this->model->findOrFail($id);

        $escolas =  DB::table('escolas')
        ->select('cod_esco', 'nome_fantasia')
        ->orderBy('nome_fantasia')
        ->get();

        $dados =array_merge(['usuario' => $usuario, 'escola' => $escolas]);

        return view('editaUsuario', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $dados = $this->model->find($id);
        $dataform = $request->all();

        if($request->hasFile('avatar'))
            $dataform['avatar'] =  base64_encode(file_get_contents($request->file('avatar')));

        $validator = Validator::make($dataform, $this->model->rules($id));

        $dados->update(array_merge(
            $validator->validated(),
            ['password' => Hash::make($request->password)]
        ));

        return redirect('usuarios')->with('success', 'Cadastro atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = $this->model->find($id);
        $dados->delete('cascade');

        return redirect('usuarios')->with('success', 'Cadastro excluído!');
    }

}
