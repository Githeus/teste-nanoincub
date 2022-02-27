@extends('layouts.app')
@push('title')
    Movimentações
@endpush
@section('content')
    <!-- Botão cadastro -->
    <div class="text-right py-2">
        <a href="/movimentacoes/create" class="btn btn-primary mr-5">
            Realizar movimentação
        </a>
    </div>

    <!-- Filtros -->
    <form id="form-filtros" action="/movimentacoes" method="get" class="border p-2 col-6">
        <h3>Filtros</h3>
        <div class="d-flex">
            <div class="flex-fill form-group bg-white d-block p-2">
                <label class="font-weight-bold">Nome do funcionario</label>
                <input type="text" id="nome_completo" name="nome_completo" value="{{$nome? $nome:''}}"  class="form-control"  >
            </div>
            <div class="flex-fill form-group bg-white d-block p-2">
                <label class="font-weight-bold">Data de cadastro</label>
                <input type="date" id="created_at" name="created_at" value="{{$data? $data:''}}"  class="form-control"  >
            </div>
            <div class="flex-fill form-group bg-white d-block p-2">
                <label class="font-weight-bold">Tipo de movimentação</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="radio-todos" name="tipo" value=""  {{$tipo?"":"checked"}}>
                    Todos
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tipo" value="entrada" {{$tipo=='entrada'?"checked":""}}>
                    Entrada
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tipo" value="saida" {{$tipo=='saida'?"checked":""}}>
                    Saída
                  </label>
                </div>
            </div>
        </div>
        <nav class="nav justify-content-center">
            <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Filtrar</button>
            <button type="button" onclick="limpar()" class="btn btn-sm btn-danger font-weight-bold">Limpar filtros</button>
        </nav>
    </form>

    <!-- Feedback das ações -->
    @include('components.feedback')

    <!-- Paginate -->
    <div class="py-2">
        {{$movimentacoes->appends(['created_at' => $data,'nome_completo'=>$nome, 'tipo'=>$tipo])->links()}}
    </div>

    <!-- Tabela de listagem de funcionários -->
    <table class="table border shadow table-striped">
        <thead>
            <tr class="bg-info text-center">
                <th>ID</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Funcionário</th>
                <th>Observação</th>
                <th>Data de criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movimentacoes as $m)
            <tr>
                <td class="text-center">{{$m->id}}</td>
                <td class="text-center">{{$m->tipo_movimentacao}}</td>
                <td class="text-center">{{$m->valor_formatado()}}</td>
                <td class="text-center">
                    #{{$m->funcionario->id}} - {{$m->funcionario->nome_completo}}
                </td>
                <td class="text-justify">
                    {{$m->observacao}}
                </td>
                <td class="text-center">
                    {{date("d/m/Y",strtotime($m->created_at))}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginate -->
    <div class="py-2">
        {{$movimentacoes->appends(['created_at' => $data,'nome_completo'=>$nome])->links()}}
    </div>


@endsection
@push('page-scripts')
<script>
    function limpar(){
        $('#nome_completo').val("")
        $('#created_at').val("")
        $('#radio-todos').prop("checked", true);
        $('#form-filtros').submit()
    }
</script>
@endpush