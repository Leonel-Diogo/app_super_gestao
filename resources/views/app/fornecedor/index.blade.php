{{--HERDANDO O TEMPLATE--}}
@extends('app.layouts._partials.main')

@section('title', 'Cliente')

{{--CRIANDO A SESSÃO PARA USO NO TEMPLATE--}}
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Forncedor</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('app.fornecedor.create')}}">Novo</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="{{route('app.fornecedor')}}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">

                <form method="post" action="{{route('app.fornecedor.select')}}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" placeholder="UF" class="borda-preta">
                    <input type="email" name="email" placeholder="E-mail" class="borda-preta">
                    <button class="borda-preta" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection