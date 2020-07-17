<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Boletim;
use Illuminate\Support\Facades\DB;

class BoletimController extends MasterController
{
    protected $model;

    public function __construct(Boletim $boletim, Request $request)
    {
        $this->model = $boletim;
        $this->request = $request;
    }

    public function boletimCompleto($id)
    {
        if(!$dados = $this->model->with(['matricula','nota'])->find($id)) {
            return response()->json(['erro' => 'Recurso não locaizado.'], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($dados, Response::HTTP_OK);
        }
    }

	public function boletimNotas($id) {
        $dados = DB::table('boletim')
        ->select('boletim.cod_bole',
        'matricula.matricula',
        'aluno.nome_aluno',
        'aluno.fotografia',
        'curso.nome_curso',
        'serie.nome_serie',
        'turno.nome_turno',
        'turma.nome_turma',
        'letivo.ano_letivo',
        'disciplina.disciplina',
        'nota.etapa_1_mar','nota.etapa_1_abr','nota.etapa_1_av3','nota.etapa_1_m','nota.etapa_1_r',
        'nota.etapa_2_mai','nota.etapa_2_jun','nota.etapa_2_av3','nota.etapa_2_m','nota.etapa_2_r',
        'nota.etapa_3_ago','nota.etapa_3_set','nota.etapa_3_av3','nota.etapa_3_m','nota.etapa_3_r',
        'nota.etapa_4_out','nota.etapa_4_nov','nota.etapa_4_av3','nota.etapa_4_m','nota.etapa_4_r',
        'nota.provao','nota.provao_r','nota.media_final',
        'nota.faltas','nota.pontos','nota.resultado_final')
        ->join('nota','nota.cod_nota','boletim.cod_nota')
        ->join('matricula','matricula.cod_matr','boletim.cod_matr')
        ->join('disciplina','disciplina.cod_disc','nota.cod_disc')
        ->join('aluno','aluno.cod_alun','matricula.cod_alun')
        ->join('curso','curso.cod_curs','matricula.cod_curs')
        ->join('serie','serie.cod_seri','matricula.cod_seri')
        ->join('turno','turno.cod_turn','matricula.cod_turn')
        ->join('turma','turma.cod_turm','matricula.cod_turm')
        ->join('letivo','letivo.cod_leti','matricula.cod_leti')
        ->where('boletim.cod_matr', $id)
        ->orderBy('nota.cod_nota')
        ->get();

        /*
        echo "<pre>";
        print_r($dados);
        */
        //return $dados;

        if($dados->isEmpty())
            $dados=[];

        return view('boletimEscolar', compact('dados'));
    }

}
