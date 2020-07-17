<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends MasterController
{
    protected $model;

    public function __construct(Curso $curso, Request $request)
    {
        $this->model = $curso;
        $this->request = $request;
    }

}
