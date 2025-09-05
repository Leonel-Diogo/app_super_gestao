<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(string $nome, int $idade)
    {
        return view(
            'site.teste',
        )->with('nome', $nome)->with('idade', $idade);
    }
}
//['nome' => $nome, 'idade' => $idade]->ARRAY ASSOCIATIVO
//compact('nome', 'idade')