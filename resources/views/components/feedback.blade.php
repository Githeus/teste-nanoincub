@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Ops... Aldo deu errado!</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
<div class="alert alert-success text-center font-weight-bold">
        <h3>
            {{session('success')}}
        </h3>
    </div>
@endif