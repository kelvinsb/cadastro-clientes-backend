<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Endereco;

class EnderecoController extends Controller
{
    public function criarEndereco($numero, $complemento, $enderecoCepId)
    {
        $endereco = new Endereco([
            'numero' =>  $numero,
            'complemento' =>  $complemento,
            'endereco_banco_id' =>  $enderecoCepId
        ]);
        $endereco->save();

        return ($endereco);
    }
}
