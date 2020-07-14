<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Escola
 * 
 * @property int $cod_esco
 * @property character varying|null $nome_empresarial
 * @property character varying|null $nome_fantasia
 * @property character varying $cnpj
 * @property character varying|null $ie
 * @property character varying|null $slogan
 * @property character varying|null $endereco
 * @property character varying|null $bairro
 * @property character varying|null $cep
 * @property character varying|null $cidade
 * @property character varying|null $estado
 * @property character varying|null $uf
 * @property character varying|null $telefone
 * @property character varying|null $fax
 * @property character varying|null $email
 * @property character varying|null $website
 * @property character varying|null $socio_1
 * @property character varying|null $socio_2
 * @property bytea|null $logo_empresa
 * @property float|null $juros
 * @property float|null $multa
 * @property float|null $mensalidade_ei
 * @property float|null $mensalidade_efi
 * @property float|null $mensalidade_efii
 * @property float|null $mensalidade_em
 * @property character varying|null $vencimento_dia
 * @property character varying|null $diretor
 * @property character varying|null $diretor_reg
 * @property character varying|null $secretario
 * @property character varying|null $secretario_reg
 * @property character varying|null $entid_mantenedora
 * @property character varying|null $dependencia_admin
 * @property character varying|null $credenc_parecer
 * @property character varying|null $credenc_parecer_val
 * @property character varying|null $recredenc_parecer
 * @property character varying|null $recredenc_parecer_val
 * @property character varying|null $instrucao_carne_alun1
 * @property character varying|null $instrucao_carne_alun2
 * @property character varying|null $instrucao_carne_com1
 * @property character varying|null $instrucao_carne_com2
 * @property string|null $instrucao_boletim_apro
 * @property string|null $instrucao_boletim_repro
 * @property character varying|null $orgao_expedidor
 * @property character varying|null $orgao_expedidor_val
 * @property character varying|null $diario_oficial
 * @property int|null $livro_numero
 * @property int|null $folha_numero
 * @property int|null $registro_numero
 * @property int|null $total_folhas_livro
 * @property int|null $total_reg_folha
 *
 * @package App\Models
 */
class Escola extends Model
{
	protected $table = 'escola';
	protected $primaryKey = 'cod_esco';
	public $timestamps = false;

	protected $casts = [
		'nome_empresarial' => 'character varying',
		'nome_fantasia' => 'character varying',
		'cnpj' => 'character varying',
		'ie' => 'character varying',
		'slogan' => 'character varying',
		'endereco' => 'character varying',
		'bairro' => 'character varying',
		'cep' => 'character varying',
		'cidade' => 'character varying',
		'estado' => 'character varying',
		'uf' => 'character varying',
		'telefone' => 'character varying',
		'fax' => 'character varying',
		'email' => 'character varying',
		'website' => 'character varying',
		'socio_1' => 'character varying',
		'socio_2' => 'character varying',
		'logo_empresa' => 'bytea',
		'juros' => 'float',
		'multa' => 'float',
		'mensalidade_ei' => 'float',
		'mensalidade_efi' => 'float',
		'mensalidade_efii' => 'float',
		'mensalidade_em' => 'float',
		'vencimento_dia' => 'character varying',
		'diretor' => 'character varying',
		'diretor_reg' => 'character varying',
		'secretario' => 'character varying',
		'secretario_reg' => 'character varying',
		'entid_mantenedora' => 'character varying',
		'dependencia_admin' => 'character varying',
		'credenc_parecer' => 'character varying',
		'credenc_parecer_val' => 'character varying',
		'recredenc_parecer' => 'character varying',
		'recredenc_parecer_val' => 'character varying',
		'instrucao_carne_alun1' => 'character varying',
		'instrucao_carne_alun2' => 'character varying',
		'instrucao_carne_com1' => 'character varying',
		'instrucao_carne_com2' => 'character varying',
		'orgao_expedidor' => 'character varying',
		'orgao_expedidor_val' => 'character varying',
		'diario_oficial' => 'character varying',
		'livro_numero' => 'int',
		'folha_numero' => 'int',
		'registro_numero' => 'int',
		'total_folhas_livro' => 'int',
		'total_reg_folha' => 'int'
	];

	protected $hidden = [
		'secretario',
		'secretario_reg'
	];

	protected $fillable = [
		'nome_empresarial',
		'nome_fantasia',
		'cnpj',
		'ie',
		'slogan',
		'endereco',
		'bairro',
		'cep',
		'cidade',
		'estado',
		'uf',
		'telefone',
		'fax',
		'email',
		'website',
		'socio_1',
		'socio_2',
		'logo_empresa',
		'juros',
		'multa',
		'mensalidade_ei',
		'mensalidade_efi',
		'mensalidade_efii',
		'mensalidade_em',
		'vencimento_dia',
		'diretor',
		'diretor_reg',
		'secretario',
		'secretario_reg',
		'entid_mantenedora',
		'dependencia_admin',
		'credenc_parecer',
		'credenc_parecer_val',
		'recredenc_parecer',
		'recredenc_parecer_val',
		'instrucao_carne_alun1',
		'instrucao_carne_alun2',
		'instrucao_carne_com1',
		'instrucao_carne_com2',
		'instrucao_boletim_apro',
		'instrucao_boletim_repro',
		'orgao_expedidor',
		'orgao_expedidor_val',
		'diario_oficial',
		'livro_numero',
		'folha_numero',
		'registro_numero',
		'total_folhas_livro',
		'total_reg_folha'
	];
}
