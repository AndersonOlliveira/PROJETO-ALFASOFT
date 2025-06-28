
@extends('layout.index')

@section('content')

<div class="container">
    <h1>Editar</h1>
    <a class="btn btn-light" href="{{route('main.index')}}">Ver Usuários</a>
</div>

<div class="container-fluid">
<form method="POST" action="{{route('main.update', ['dados' => $dados->id])}}">
    @csrf
    @method('PUT')

    <div class="form-group">

        @if( session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome:</label>
            <input class="form-control" name="nameInput" value="{{ old('nome', $dados->nome)}}" type="text" placeholder="Default input" aria-label="default input example">

            </di>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="emailInput" value="{{ old('email', $dados->email)}}"  id="exampleInputEmail1">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefone Contato</label>
                <input type="tel" class="form-control" id="contatoInput" value="{{ old('contato', $dados->contato)}}"  name="contatoInput" maxlength="10" placeholder="98999-9999">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endSection