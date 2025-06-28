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
                    <th>Deletado</th>
                    <th>Ações</th>
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
                    <td>
                        @if(isset($dados->deleted_at))
                        {{ \Carbon\Carbon::parse($dados->deleted_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}
                        @else
                        Contato Não foi deletado
                        @endif
                    </td>
                    <td>
                        @if(isset($dados->deleted_at))
                        <form action="{{ route('main.ativeContact', ['id' => $dados->id ]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja Ativar?')" class="btn btn-success btn-sm">
                                Ativar
                            </button>
                        </form>

                        @endif
                        <a href="{{ route('main.edit', ['dados' => $dados->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                        @if(!isset($dados->deleted_at))

                        <form action="{{ route('main.delete', ['dados' => $dados->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja Deletar?')" class="btn btn-danger btn-sm">
                                Deletar
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    @endSection