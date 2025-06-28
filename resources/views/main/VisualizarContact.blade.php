@extends('layout.index')

@section('content')
<div class="container">
<div class="container">
  <div class="row">
    <div class="col">
    <h1>Visualizar</h1>
 <a class="btn btn-light" href="{{route('main.index')}}">Ver Usuários</a>
</div>
</div>
</div>
<br>

<div class="container-fluid">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CONTATO</th>
                <th>EMAIL</th>
                <th>CRIADO EM</th>
                <th>Atualizado EM</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome }}</td>
                <td>{{ $dados->contato }}</td>
                <td>{{ $dados->email }}</td>
                <td>{{ \Carbon\Carbon::parse($dados->created_at)->tz('America/Sao_Paulo')->format('d/m/Y')  }}</td>
                <td>{{ \Carbon\Carbon::parse($dados->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y')  }}</td>
            </tr>
        </tbody>
    </table>
</div>


@endSection