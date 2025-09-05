<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/style_basic.css')}}">
</head>

<body>
    {{--INCLUSÃO DO TOPO DAS VIEWS--}}
    @include('site.layouts._partials.topo')

    {{--CHAMANDO A SESSÃO IDEAL--}}
    @yield('content')
</body>

</html>