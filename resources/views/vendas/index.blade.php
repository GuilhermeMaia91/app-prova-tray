@extends('layouts.main')
@section('title', 'Retrieve')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Lista de Vendas</h3>
        </div>
        <div class="col-md-12">
            <a href="/" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="/vendas/create" class="btn btn-success">Novo</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Comissão</th>
                    <th>Valor Venda</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendas['data'] as $venda)
                    <tr>
                        <td>{{ $venda['id'] }}</td>
                        <td>{{ $venda['name'] }}</td>
                        <td>{{ $venda['email'] }}</td>
                        <td>{{ $venda['commission'] }}</td>
                        <td>{{ $venda['price_sale'] }}</td>
                        <td>{{ $venda['created_at'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection