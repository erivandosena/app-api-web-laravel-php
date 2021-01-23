<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioPapel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class UsuarioPapelController extends Controller
{
    protected $model;

    public function __construct(UsuarioPapel $usuarioPapel, Request $request)
    {
        $this->model = $usuarioPapel;
        $this->request = $request;
    }


    public function indexUsuarioPapel() {
        //
    }

    public function createUsuarioPapel()
    {
        //
    }

    public function storeUsuarioPapel(Request $request)
    {
        $dataform = $request->all();
        $usuario_id = $request->input('usuario_id');

        $validator = Validator::make($dataform, $this->model->rules());

        UsuarioPapel::create($validator->validated());

        return redirect('usuarios/edita/papel/'. $usuario_id)->with('success', 'Salvo com sucesso!');
    }

    public function editUsuarioPapel($id) {
        $usuario_papel = $this->model->findOrFail($id);

        $usuario_papeis =  DB::table('usuarios_papeis')
        ->select('usuarios_papeis.usuario_id', 'usuarios_papeis.papel_id', 'papeis.name', 'papeis.slug')
        ->join('papeis','papeis.id','usuarios_papeis.papel_id')
        ->where('usuarios_papeis.usuario_id', $id)
        ->orderBy('papeis.name')
        ->paginate(25);

        $papeis =  DB::table('papeis')
        ->select('id', 'name', 'slug')
        ->orderBy('name')
        ->get();

        $permissoes =  DB::table('usuarios_permissoes')
        ->select('usuarios_permissoes.permissao_id', 'permissoes.name')
        ->join('permissoes','permissoes.id','usuarios_permissoes.permissao_id')
        ->where('usuarios_permissoes.usuario_id', $id)
        ->orderBy('permissoes.name')
        ->get();

        $usuario =  DB::table('usuarios')
        ->select('usuarios.id', 'usuarios.name')
        ->join('usuarios_papeis','usuarios_papeis.usuario_id','usuarios.id')
        ->where('usuarios_papeis.usuario_id', $id)
        ->get();

        $dados = array_merge(['usuario_papel' => $usuario_papel, 'usuario_papeis' => $usuario_papeis, 'papeis' => $papeis, 'permissoes' => $permissoes, 'usuario' => $usuario]);

        return view('editaUsuarioPapel', compact('dados'));
    }

    public function updateUsuarioPapel(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUsuarioPapel(Request $request, $id)
    {
        $dados = $this->model->find($id);
        $usuario_id = $request->input('usuario_id');

        $dados->delete('cascade');

        return redirect('usuarios/edita/papel/'. $usuario_id)->with('success', 'Excluído com sucesso!');
    }

}
