<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal()
    {
        #PEGANDO OS REGISTROS DE MOTIVO CONTATO
        $contact_reason = MotivoContato::all();
        return view('site.principal', ['contact_reason' => $contact_reason]);
    }
}


