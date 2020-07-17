<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends MasterController
{
    protected $model;

    public function __construct(Curso $curso, Request $request)
    {
        $this->middleware('api');
        $this->model = $curso;
        $this->request = $request;
    }

}
