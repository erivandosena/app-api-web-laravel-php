<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends MasterController
{
    protected $model;

    public function __construct(Serie $serie, Request $request)
    {
        $this->model = $serie;
        $this->request = $request;
    }

}
