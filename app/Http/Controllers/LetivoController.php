<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letivo;

class LetivoController extends MasterController
{
    protected $model;

    public function __construct(Letivo $letivo, Request $request)
    {
        $this->middleware('api');
        $this->model = $letivo;
        $this->request = $request;
    }

}
