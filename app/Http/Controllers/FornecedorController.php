<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }
    #FORM DE CADASTRO
    public function create()
    {
        return view('app.fornecedor.create');
    }
    #SALVAR OS DADOS NA BD
    public function store(Request $request)
    {
        if ($request->method() == 'POST') {#$request->input('_token') != ''
            #REGRAS VALIDAÇÃO DE CAMPOS
            $rules = [
                'name' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            #FEEDBACK AO USUÁRIO EM CASO DE ERRO
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];
            $request->validate($rules, $feedback);

            #CRIAÇÃO DE OBJETO E CADASTRO NA BD
            Fornecedor::create($request->all());

            #REDIRECIONAMENTO APÓS CADASTRAR
            return redirect()
                ->route('app.fornecedor.create')
                #FEEDBACK DE CADASTRO
                ->with('message', 'Cadastro realizado com sucesso');
        }
    }
    public function select(Request $request)
    {
        $fornecedores = Fornecedor::where('name', 'like', '%' . $request->input('name') . '%')
            ->where('name', 'like', '%' . $request->input('name') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();
        return view('app.fornecedor.select', ['fornecedores' => $fornecedores]);
    }

}
