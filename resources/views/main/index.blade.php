@extends('layout.index')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
   <h1>Lista de Usuários</h1>
   <a class="btn btn-info" href="{{route('main.create')}}">Adicionar</a>
</div>
</div>
</div>
<br>

<div class="container-fluid">



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


  <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CONTATO</th>
            <th>EMAIL</th>
            <th>CRIADO EM</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
      
  <!-- apresento os registros -->
  @forelse($contacts as $listContact)
        <tr>
            <td>{{ $listContact->id }}</td>
            <td>{{ $listContact->nome }}</td>
            <td>{{ $listContact->contato }}</td>
            <td>{{ $listContact->email }}</td>
            <td>
                {{ \Carbon\Carbon::parse($listContact->created_at)->tz('America/Sao_Paulo')->format('d/m/Y') }}
            </td>
            <td>
                @if($listContact->info != 0)
                   <a href="{{ route('main.preview', ['dados' => $listContact->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
                    {{-- Botão para reativar --}}
                    <form action="{{ route('main.ativeContact', ['id' => $listContact->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja Ativar?')" class="btn btn-success btn-sm">
                            Ativar
                        </button>
                    </form>
                @else
                    {{-- Ações se não estiver deletado --}}
                    {{ \Carbon\Carbon::parse($listContact->info)->tz('America/Sao_Paulo')->format('d/m/Y') }}<br>

                    <a href="{{ route('main.preview', ['dados' => $listContact->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
                    <a href="{{ route('main.edit', ['dados' => $listContact->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('main.delete', ['dados' => $listContact->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja Deletar?')" class="btn btn-danger btn-sm">
                            Deletar
                        </button>
                    </form>
                @endif
            </td>
        </tr>
          @empty
  @endforelse
    </tbody>
  
</table>

</div> 
<!-- final do containeir -->


@endSection