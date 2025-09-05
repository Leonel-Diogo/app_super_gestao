<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;
use function PHPUnit\Framework\returnArgument;
class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        #PEGANDO OS REGISTROS DE MOTIVO CONTATO
        $contact_reason = MotivoContato::all();
        return view('site.contato', ['contact_reason' => $contact_reason]);
    }
    public function save(Request $request)
    {
        #VALIDAR OS DADOS DO REQUEST
        $request->validate(
            #VALIDAÇÃO
            [
                'name' => 'required|min:3|max:50',
                'phone' => 'required|unique:site_contatos',
                'email' => 'required|email|unique:site_contatos',
                'contact_reason_id' => 'required',
                'message' => 'required|max:2000',
            ],
            #CUSTOMIZAÇÃO DO FEEDBACK AO USUÁRIO
            [
                'required' => 'Campo :attribute é obrigatório',
                'name.min' => 'O nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O nome deve ter no máximo 50 caracteres',
                'unique' => 'O :attribute já existe',
                'email.email' => 'email inválido',
                'message.max' => 'A mensagem deve ter máximo 2000 caracteres'
            ]
        );
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}