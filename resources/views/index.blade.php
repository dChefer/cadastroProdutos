@extends('layout.app', ['current' => 'home'])

@section('body')

    <div class="jumbotrom bg-light border border-primary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadatro de Produtos</h5>
                        <p class="card-text">
                            Aqui se cadastra os produtos!!
                        </p>
                        <a href="/produtos" class="btn btn-outline-primary">Cadastrar Produtos</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadatro de Categorias</h5>
                        <p class="card-text">
                            Aqui se cadastra os Categorias!!
                        </p>
                        <a href="/categorias" class="btn btn-outline-primary">Cadastrar Categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
