@extends('layout.app', ['current' => 'categorias'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>
            <div class="card">
                <a href="/categorias/novo" class="btn btn-sm btn-outline-info" role="button">Cadastrar Categorias</a>
            </div>
            
            @if(count($deps) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome da Categoria</th>
                        <th>Ações</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach ($deps as $dep)
                        <tr>
                            <td>{{ $dep->id }}</td>
                            <td>{{ $dep->nome }}</td>
                            <td>
                                <a href="/categorias/editar/{{$dep->id }}" class="btn btn-outline-info">Editar</a>   
                                <a href="/categorias/apagar/{{$dep->id }}" class="btn btn-outline-danger">Apagar</a>   
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            @endif    
        </div>
    </div>

@endsection