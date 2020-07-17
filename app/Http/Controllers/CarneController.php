<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carne;

class CarneController extends MasterController
{
    protected $model;

    public function __construct(Carne $carne, Request $request)
    {
        $this->middleware('api');
        $this->model = $carne;
        $this->request = $request;
    }

}
