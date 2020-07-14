<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;

class TurnoController extends MasterController
{
    protected $model;

    public function __construct(Turno $turno, Request $request)
    {
        $this->model = $turno; 
        $this->request = $request;       
    }

}