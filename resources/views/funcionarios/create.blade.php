@extends('layouts.app')
@push('title')
    Cadastro de funcionários
@endpush
@section('content')
    <form action="" method="post" class="row">
    @csrf
    @include('funcionarios.form')
    </form>
@endsection