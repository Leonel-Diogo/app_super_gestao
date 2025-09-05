<h3>Fornecedores</h3>

{{-- Isso é um comentário da sintaxe blade --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        Iteração atual: {{$loop->iteration}}
        <p>Nome: {{ $fornecedor['nome'] }}</p>
        <p>Status: {{ $fornecedor['status'] }}</p>
        <p>BI: {{ $fornecedor['bi'] ?? 'Dados não preenchido' }}</p>
        <p>
            Telefone: ({{ $fornecedor['ddd'] ?? '' }})
            {{ $fornecedor['telefone'] ?? '' }}
        </p>
        @if ($loop->first)
            Primeira Iteração
        @endif
        @if ($loop->last)
            Última Iteração
        @endif
        <hr>
    @empty
        Não existem elementos no array.
    @endforelse
@endisset