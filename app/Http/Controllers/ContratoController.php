<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;

class ContratoController extends MasterController
{
    protected $model;

    public function __construct(Contrato $contrato, Request $request)
    {
        $this->middleware('api');
        $this->model = $contrato;
        $this->request = $request;
    }

}
