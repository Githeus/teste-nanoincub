@extends('layouts.app')
@push('title')
    Edição de informações do funcionário
@endpush
@section('content')
    <a href="/funcionarios" class="btn btn-sm btn-danger text-white font-weight-bold">
        << Voltar
    </a>
    <form action="{{route('funcionarios.update',$funcionario)}}" method="post" class="row">
        @csrf
        @method('PUT')
        @include('funcionarios.form')
    </form>
@endsection