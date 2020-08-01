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
        $dados = DB::table('boletins')
        ->select('boletins.cod_bole',
        'matriculas.matricula',
        'alunos.nome_aluno',
        'alunos.fotografia',
        'cursos.nome_curso',
        'series.nome_serie',
        'turnos.nome_turno',
        'turmas.nome_turma',
        'letivos.ano_letivo',
        'disciplinas.disciplina',
        'notas.etapa_1_mar','notas.etapa_1_abr','notas.etapa_1_av3','notas.etapa_1_m','notas.etapa_1_r',
        'notas.etapa_2_mai','notas.etapa_2_jun','notas.etapa_2_av3','notas.etapa_2_m','notas.etapa_2_r',
        'notas.etapa_3_ago','notas.etapa_3_set','notas.etapa_3_av3','notas.etapa_3_m','notas.etapa_3_r',
        'notas.etapa_4_out','notas.etapa_4_nov','notas.etapa_4_av3','notas.etapa_4_m','notas.etapa_4_r',
        'notas.provao','notas.provao_r','notas.media_final',
        'notas.faltas','notas.pontos','notas.resultado_final',
        'boletins.cod_esco')
        ->join('notas','notas.cod_nota','boletins.cod_nota')
        ->join('matriculas','matriculas.cod_matr','boletins.cod_matr')
        ->join('disciplinas','disciplinas.cod_disc','notas.cod_disc')
        ->join('alunos','alunos.cod_alun','matriculas.cod_alun')
        ->join('cursos','cursos.cod_curs','matriculas.cod_curs')
        ->join('series','series.cod_seri','matriculas.cod_seri')
        ->join('turnos','turnos.cod_turn','matriculas.cod_turn')
        ->join('turmas','turmas.cod_turm','matriculas.cod_turm')
        ->join('letivos','letivos.cod_leti','matriculas.cod_leti')
        ->where('boletins.cod_matr', $id)
        ->orderBy('notas.cod_nota')
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
