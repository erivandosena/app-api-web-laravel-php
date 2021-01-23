<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioPermissao;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsuarioPermissaoController extends Controller
{
    protected $model;

    public function __construct(UsuarioPermissao $usuarioPermissao, Request $request)
    {
        $this->model = $usuarioPermissao;
        $this->request = $request;
    }

    public function indexUsuarioPermissao() {
        //
    }

    public function createUsuarioPermissao()
    {
        //
    }

    public function storeUsuarioPermissao(Request $request)
    {
        $dataform = $request->all();
        $usuario_id = $request->input('usuario_id');

        $validator = Validator::make($dataform, $this->model->rules());

        UsuarioPermissao::create($validator->validated());

        return redirect('usuarios/edita/permissao/'. $usuario_id)->with('success', 'Salvo com sucesso!');
    }

    public function editUsuarioPermissao($id) {
        $usuario_permissao = $this->model->findOrFail($id);

        $usuario_permissoes =  DB::table('usuarios_permissoes')
        ->select('usuarios_permissoes.usuario_id', 'usuarios_permissoes.permissao_id', 'permissoes.name', 'permissoes.slug')
        ->join('permissoes','permissoes.id','usuarios_permissoes.permissao_id')
        ->where('usuarios_permissoes.usuario_id', $id)
        ->orderBy('permissoes.name')
        ->paginate(25);

        $permissoes =  DB::table('permissoes')
        ->select('id', 'name', 'slug')
        ->orderBy('name')
        ->get();

        $papeis =  DB::table('usuarios_papeis')
        ->select('usuarios_papeis.papel_id', 'papeis.name')
        ->join('papeis','papeis.id','usuarios_papeis.papel_id')
        ->where('usuarios_papeis.usuario_id', $id)
        ->orderBy('papeis.name')
        ->get();

        $usuario =  DB::table('usuarios')
        ->select('usuarios.id', 'usuarios.name')
        ->join('usuarios_permissoes','usuarios_permissoes.usuario_id','usuarios.id')
        ->where('usuarios_permissoes.usuario_id', $id)
        ->get();

        $dados = array_merge(['usuario_permissao' => $usuario_permissao, 'usuario_permissoes' => $usuario_permissoes, 'permissoes' => $permissoes, 'papeis' => $papeis, 'usuario' => $usuario]);

        return view('editaUsuarioPermissao', compact('dados'));
    }

    public function updateUsuarioPermissao(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUsuarioPermissao(Request $request, $id)
    {
        $dados = $this->model->find($id);
        $usuario_id = $request->input('usuario_id');
        $dados->delete('cascade');

        return redirect('usuarios/edita/permissao/'. $usuario_id)->with('success', 'Excluído com sucesso!');
    }

}
