@extends('layouts.app')
@push('title')
    Cadastro de funcionários
@endpush
@section('content')
    <a href="/funcionarios" class="btn btn-sm btn-danger text-white font-weight-bold">
        << Voltar
    </a>
    <form action="/funcionarios" method="post" class="row">
        @csrf
        @include('funcionarios.form')
    </form>
@endsection