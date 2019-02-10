@extends('layouts.main')
@section('title', 'Retrieve')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Lista de Vendedores</h3>
        </div>
        <div class="col-md-12">
            <a href="/" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Comissão</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendedores['data'] as $vend)
                    <tr>
                        <td>{{ $vend['id'] }}</td>
                        <td>{{ $vend['name'] }}</td>
                        <td>{{ $vend['email'] }}</td>
                        <td>{{ $vend['comissao'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection