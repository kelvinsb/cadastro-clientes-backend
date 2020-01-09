<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Sexo;
use App\Endereco;

use DB;

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

    public function listar()
    {
        $itens = DB::table('clientes as cli')
                    ->join('sexos as sex', 'cli.sexo_id', '=', 'sex.id')
                    ->join('enderecos as end', 'cli.endereco_id', '=', 'end.id')
                    ->join('endereco_ceps as end_cep', 'end.endereco_banco_id', '=', 'end_cep.id')
                    ->select(
                        'cli.id as id',
                        'cli.nome as nome',
                        'cli.data_nascimento as data_nascimento',
                        'sex.descricao as sexo',
                        'end_cep.cep as cep',
                        'end_cep.logradouro as logradouro',
                        'end.complemento as complemento',
                        'end.numero as numero',
                        'end_cep.bairro as bairro',
                        'end_cep.cidade as cidade',
                        'end_cep.estado as estado'
                    )
                    ->whereNull('cli.excluded_on')
                    ->get();
        return response()->json([
            "resultado"     =>  $itens
        ], 200);


        return response()->json([
            "resultado"     =>  Sexo::select('id','descricao')
                ->whereNull('excluded_on')
                ->get()
        ], 200);

    }

    public function deletar(Request $request, $id)
    {
        $item = Cliente::findOrFail($id);
        if (!$item) {
            return response('', 404);
        }
        $item->excluded_on = DB::raw('now()');
        $endereco = Endereco::findOrFail($item->endereco_id);
        $endereco->excluded_on = DB::raw('now()');
        $item->save();
        $endereco->save();
        return response('', 200);
    }
}
