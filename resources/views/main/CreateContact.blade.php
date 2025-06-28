
@extends('layout.index')

@section('content')

<div class="container">
    <h1>Criar</h1>
   <a class="btn btn-light" href="{{route('main.index')}}">Ver Usuários</a>
</div>

<div class="container-fluid">
@if($errors->any())

<span style="color: red">
    @foreach($errors->all() as $erro)

   <div class="alert alert-danger"> {{$erro}}</div> <br>

    @endforeach

</span>

@endif

<br>
<h1>Criar Contato</h1>
<form method="POST" class="form-control" action="{{route('main.store')}}">
    @csrf
    <div class="form-group">

        @if(session('success'))
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
            <input class="form-control" name="nameInput" value="{{ old('nameInput')}}"  type="text" placeholder="Default input" aria-label="default input example">

            </di>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{ old('emailInput')}}"  name="emailInput" id="exampleInputEmail1">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefone Contato</label>
                <input type="tel" class="form-control" value="{{ old('contatoInput')}}"  id="contatoInput" name="contatoInput" maxlength="9" placeholder="98999-9999">

            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
</form>

</div>


@endSection