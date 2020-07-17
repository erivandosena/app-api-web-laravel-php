<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends MasterController
{
    protected $model;

    public function __construct(Serie $serie, Request $request)
    {
        $this->middleware('api');
        $this->model = $serie;
        $this->request = $request;
    }

}
