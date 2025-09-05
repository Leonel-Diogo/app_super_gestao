<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            [
                'nome' => 'Pedro',
                'status' => 'S',
                'bi' => '',
                'ddd' => '11',
                'telefone' => '934536373'
            ],
            [
                'nome' => 'Álvaro',
                'status' => 'N',
                'bi' => '005787044LA049',
                'ddd' => '15',
                'telefone' => '914536370'
            ],
            [
                'nome' => 'Patrício',
                'status' => 'S',
                'bi' => '005087044LA047',
                'ddd' => '13',
                'telefone' => '955536370'
            ]
        ];
        #$fornecedores = [];
        return view(
            'app.fornecedor.index',
            compact('fornecedores')
        );
    }
}
