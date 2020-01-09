<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EnderecoCep;

class EnderecoCepController extends Controller
{
    public function criarEnderecoCep($request)
    {
        $enderecoCep = new EnderecoCep([
            'cep'   =>  $request->cep,
            'logradouro'   =>  $request->logradouro,
            'bairro'   =>  $request->bairro,
            'cidade'   =>  $request->cidade,
            'estado'   =>  $request->estado
        ]);
        $enderecoCep->save();
        return ($enderecoCep);
    }

    public function procurarPorCep($cep)
    {
        $existe = EnderecoCep::where('cep', '=', $cep)->first();
        return $existe;
    }
}
