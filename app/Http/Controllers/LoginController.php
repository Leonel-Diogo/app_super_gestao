<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $error = '';
        if ($request->get('error') == 1) {
            $error = 'Usuário e ou senha não existe';
        }
        if ($request->get('error') == 2) {
            $error = 'Faça login para acessar a página';
        }
        return view(
            'site.login',
            ['titulo' => 'Login', 'error' => $error]
        );
    }
    public function autenticar(Request $request)
    {
        #REGRAS DE VALIDAÇÃO
        $rules = [
            'email' => 'email',
            'password' => 'required'
        ];
        #FEEDBACK DE VALIDAÇÃO
        $feedback = [
            'email.email' => 'O usuário é um campo obrigatório',
            'password.required' => 'A senha é um campo obrigatório'
        ];

        #VALIDAÇÃO
        $request->validate($rules, $feedback);

        #PEGANDO OS VALORES DO FORM
        $email = $request->get('email');
        $password = $request->get('password');

        #INICIAR O MODEL USER
        $user = new User();

        $userExists = $user->where('email', $email)
            ->where('password', $password)
            ->get()->first();
        if (isset($userExists->name)) {
            #FAZER LOGIN
            session_start();
            $_SESSION['name'] = $userExists->name;
            $_SESSION['email'] = $userExists->email;

            return redirect()->route('app.home');

        } else {
            #EM CASO DE USUÁRIO NÃO EXISTIR
            return redirect()->route('site.login', ['error' => 1]);
        }
    }
    public function logout()
    {
        #echo 'Sair';
        session_destroy();
        return redirect()->route('site.login');
    }

}


