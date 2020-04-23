@extends('layout.app', ['current' => 'categorias'])

@section('body')
    <div class="card border">
        <div class="cardy-border">
            <form action="/categorias/{{$dep->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nameDepartment">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nameDepartment"
                        id="nameDepartment" value="{{$dep->nome }}" placeholder="Categorias...">
                </div>
                <button type="submit" class="btn btn-outline-success btn-sn">Salvar</button>
                <button type="cancel" class="btn btn-outline-danger btn-sn">Cancelar</button>
            </form>
        </div>
    </div>

@endsection