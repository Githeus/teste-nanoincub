@extends('layouts.app')
@push('title')
    Funcionários
@endpush
@section('content')
    <!-- Botão cadastro -->
    <div class="text-right py-2">
        <a href="/funcionarios/create" class="btn btn-primary mr-5">
            Cadastrar novo funcionário
        </a>
    </div>

    <!-- Filtros -->
    <form id="form-filtros" action="/funcionarios" method="get" class="border p-2 col-4">
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
        {{$funcionarios->appends(['created_at' => $data,'nome_completo'=>$nome])->links()}}
    </div>

    <!-- Tabela de listagem de funcionários -->
    <table class="table border shadow table-striped">
        <thead>
            <tr class="bg-info text-center">
                <th width="10%"></th>
                <th>ID</th>
                <th>Nome completo</th>
                <th>Saldo atual</th>
                <th>Data de criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $f)
            <tr>
                <td>
                    <div class="dropright">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown">
                            Ações
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{route('funcionarios.show',$f)}}">
                                Visualiza extrato
                            </a>
                            <a class="dropdown-item" href="{{route('funcionarios.edit',$f)}}">
                                Editar
                            </a>
                            <form action="{{route('funcionarios.destroy',$f->id)}}" method="post" onsubmit="return confirm('Você tem certeza que deseja excluir este registro?');">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" style="background-color: #ffcfcf;">Excluir</button>
                            </form>
                            
                        </div>
                    </div>
                <td class="text-center">{{$f->id}}</td>
                <td class="text-justify">{{$f->nome_completo}}</td>
                <td class="text-justify">{{$f->saldo_formatado()}}</td>
                <td class="text-center">{{date("d/m/Y",strtotime($f->created_at))}}</td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginate -->
    <div class="py-2">
        {{$funcionarios->appends(['created_at' => $data,'nome_completo'=>$nome])->links()}}
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