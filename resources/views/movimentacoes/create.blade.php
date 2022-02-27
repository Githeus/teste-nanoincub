@extends('layouts.app')
@push('title')
    Realizar movimentação
@endpush
@section('content')
    <a href="/movimentacoes" class="btn btn-sm btn-danger text-white font-weight-bold">
        << Voltar
    </a>
    <form action="/movimentacoes" method="post" class="row">
        @csrf
        @include('movimentacoes.form')
    </form>

@endsection