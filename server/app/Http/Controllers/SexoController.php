<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sexo;

class SexoController extends Controller
{
    public function index()
    {
        return response()->json([
            "resultado"     =>  Sexo::select('id','descricao')
                ->whereNull('excluded_on')
                ->get()
        ], 200);
    }
}
