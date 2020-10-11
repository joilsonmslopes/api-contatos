<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contato;

class ContatoController extends Controller
{
    public function status()
    {
        return ['status' => 'ok'];
    }

    public function store(Request $request)
    {
        try {
            $contato = new Contato;

            $contato->nome = $request->nome;
            $contato->telefone = $request->telefone;
            $contato->email = $request->email;

            $contato->save();

        return ['retorno'=>'Contato cadastrado com sucesso'];
        } catch (\Exception $err) {
            return ['retorno'=>'error', 'details'=>$err];
        }
    }

    public function list()
    {
        $contato = Contato::all('id', 'nome');

        return $contato;
    }

    public function select($id)
    {
        $contato = Contato::find($id);

        return $contato;
    }

    public function update(Request $request, $id)
    {
        try {
            $contato = Contato::find($id);

            $contato->nome = $request->nome;
            $contato->telefone = $request->telefone;
            $contato->email = $request->email;

            $contato->save();

            return ['retorno'=>'Contato atualizado com sucesso', 'data'=>$contato];
        } catch (\Exception $err) {
            return ['retorno'=>'Error', 'details'=>$err];
        }
    }
}
