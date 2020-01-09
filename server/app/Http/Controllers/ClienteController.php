<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Sexo;
use App\Endereco;

class ClienteController extends Controller
{
    public function criar(Request $request)
    {
        // EnderecoCep
        $enderecoCepController = new EnderecoCepController();
        $objetoEnderecoCep = (object) $request->endereco['endereco_cep'];
        $enderecoCep = $enderecoCepController->procurarPorCep($objetoEnderecoCep->cep);
        if(!$enderecoCep) {
            $enderecoCep = $enderecoCepController->criarEnderecoCep(($objetoEnderecoCep));
        }

        // Endereco
        $enderecoController = new EnderecoController();
        $endereco = $enderecoController->criarEndereco(
            $request->endereco['numero'],
            $request->endereco['complemento'],
            $enderecoCep->id
        );

        // Sexo
        $erroSexo = response()->json([
            'message'   =>  'Sexo nao encontrado',
        ], 404);
        $sexo = Sexo::find($request->sexo_id);
        if (!$sexo) {
            return $erroSexo;
        }

        $cliente = new Cliente([
            'nome' =>  $request->nome,
            'data_nascimento' =>  $request->data_nascimento,
            'sexo_id' =>  $sexo->id,
            'endereco_id' =>  $endereco->id
        ]);
        $cliente->save();
        if(!$cliente->exists())
        {
            return response()->json([
                'message'   =>  'Houve algum problema ao salvar cliente'
            ], 500);
        }
        return response('', 201);
        
    }
}
