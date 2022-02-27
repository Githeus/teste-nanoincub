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
    <form id="form-filtros" action="/movimentacoes" method="get" class="border p-2 col-4">
        <h3>Filtros</h3>
        <div class="d-flex">
            <div class="flex-fill form-group bg-white d-block p-2">
                <label class="font-weight-bold">Nome completo</label>
                <input type="text" id="nome_completo" name="nome_completo" value="{{$nome? $nome:''}}"  class="form-control" >
            </div>
            <div class="flex-fill form-group bg-white d-block p-2">
                <label class="font-weight-bold">Data de cadastro</label>
                <input type="date" id="created_at" name="created_at" value="{{$data? $data:''}}"  class="form-control" >
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
        {{$movimentacoes->appends(['created_at' => $data,'nome_completo'=>$nome])->links()}}
    </div>

    <!-- Tabela de listagem de funcionários -->
    <table class="table border shadow table-striped">
        <thead>
            <tr class="bg-info text-center">
                <th width="10%"></th>
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
                <td>
                    <div class="dropright">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown">
                            Ações
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="#">
                                Visualiza extrato
                            </a>
                            <a class="dropdown-item" href="{{route('funcionarios.edit',$m)}}">
                                Editar
                            </a>
                            <form action="{{route('funcionarios.destroy',$m->id)}}" method="post" onsubmit="return confirm('Você tem certeza que deseja excluir este registro?');">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" style="background-color: #ffcfcf;">Excluir</button>
                            </form>
                            
                        </div>
                    </div>
                <td class="text-center">{{$m->id}}</td>
                <td class="text-center">{{$m->tipo_movimentacao}}</td>
                <td class="text-center">{{$m->valor_formatado()}}</td>
                <td class="text-center">
                    #{{$m->funcionario->id}} - {{$m->funcionario->nome_completo}}
                </td>
                <td class="text-center">
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
        $('#form-filtros').submit()
    }
</script>
@endpush