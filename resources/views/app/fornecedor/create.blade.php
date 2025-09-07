{{--HERDANDO O TEMPLATE--}}
@extends('app.layouts._partials.main')

@section('title', 'Cliente')

{{--CRIANDO A SESSÃO PARA USO NO TEMPLATE--}}
@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Forncedor</p>
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
                @if(session('message'))
                    <p style="color: green">{{ session('message') }}</p>
                @endif
                <form method="post" action="{{route('app.fornecedor.store')}}">
                    @csrf
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Nome" class="borda-preta">
                    {{$errors->has('name') ? $errors->first('name') : ''}}
                    <input type="text" name="site" value="{{old('site')}}" placeholder="Site" class="borda-preta">
                    {{$errors->has('site') ? $errors->first('site') : ''}}
                    <input type="text" name="uf" value="{{old('uf')}}" placeholder="UF" class="borda-preta">
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type="email" name="email" value="{{old('email')}}" placeholder="E-mail" class="borda-preta">
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button class="borda-preta" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>

@endsection