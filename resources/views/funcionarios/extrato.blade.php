@extends('layouts.app')
@push('title')
    Extrato de movimentações de {{$funcionario->nome_completo}}
@endpush
@section('content')
    <a href="/funcionarios" class="btn btn-sm btn-danger text-white font-weight-bold">
        << Voltar
    </a>
    <h2 class="my-3">
        Saldo atual: {{$funcionario->saldo_formatado()}}
    </h2>
   <table class="table border table-striped">
       <thead>
           <tr>
               <th width="20%">Data da movimentação</th>
               <th width="10%">Tipo</th>
               <th width="20%">Valor</th>
               <th width="50%">Observação</th>
           </tr>
       </thead>
       <tbody>
           @foreach($funcionario->movimentacoes as $m)
           <tr>
               <td> {{date("d/m/Y",strtotime($m->created_at))}} </td>
               <td>{{$m->tipo_movimentacao}}</td>
               <td>{{$m->valor_formatado()}}</td>
               <td>{{$m->observacao}}</td>
           </tr>
           @endforeach
       </tbody>
   </table>
@endsection