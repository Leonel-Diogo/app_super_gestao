<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao)
    {
        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e a senha no Banco';
        }
        #VERIFICANDO SE O USUÁRIO POSSUI ACESSO
        if (true) {
            return $next($request);
        } else {
            return Response('Acesso negado! A rota exige autenticação');
        }
    }

}
