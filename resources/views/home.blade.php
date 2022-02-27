@extends('layouts.app')
@push('title')
    Módulos disponíveis
@endpush
@section('content')
    <div class="row mt-5">
        <div class="col-12 col-lg-6 px-auto card py-5">
            <h1 class="text-center">
                FUNCIONÁRIOS
            </h1>
            <a href="#" class="btn btn-info font-weight-bold text-white mx-auto" style="max-width: 50%;">
                Acessar
            </a>
        </div>
        <div class="col-12 col-lg-6 px-2 card py-5">
            <h1 class="text-center">
                MOVIMENTAÇÕES
            </h1>
            <a href="#" class="btn btn-info font-weight-bold text-white mx-auto" style="max-width: 50%;">
                Acessar
            </a>
        </div>
    </div>
       
@endsection
