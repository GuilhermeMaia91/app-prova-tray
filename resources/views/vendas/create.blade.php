@extends('layouts.main')
@section('title', 'Create')

@section('content')

    <div class="col-md-4 col-md-offset-3 bg-default">

        @if ($errors->has('user_id')) {{ $errors->first('user_id') }} <br> @endif
        @if ($errors->has('price_sale')) {{ $errors->first('price_sale') }} <br> @endif

        <h3>Cadastrar Venda</h3><hr>
        <form action="{{ url('vendas')}}" method="POST">
            @csrf
            <label for="name">Código Vendedor</label>
            <select name="user_id" id="codigo_vendedor" class="form-control">
                <option value=""></option>
                @foreach($vendedores as $vend)
                    <option value="{{ $vend['id'] }}">{{ $vend['name'] . ' - ' . $vend['email'] }}</option>
                @endforeach
            </select><br>
            <label for="course">Preço da Venda</label>
            <input type="text" name="price_sale" id="preco_venda" class="form-control"><br>
            <input type="submit" value="Salvar" name="submit" class="btn btn-primary">
        </form>
    </div>

@endsection