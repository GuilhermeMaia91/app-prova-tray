@extends('layouts.main')
@section('title', 'Create')

@section('content')

    <div class="col-md-4 col-md-offset-3 bg-default">

        @if ($errors->has('name')) {{ $errors->first('name') }} <br> @endif
        @if ($errors->has('email')) {{ $errors->first('email') }} <br> @endif

        <h3>Cadastrar Vendedor</h3><hr>
        <form action="{{ url('vendedores')}}" method="POST">
            @csrf
            <label for="name">Nome</label>
            <input type="text" name="name" id="vendname" class="form-control"><br>
            <label for="course">Email</label>
            <input type="text" name="email" id="vendemail" class="form-control"><br>
            <input type="submit" value="Salvar" name="submit" class="btn btn-primary">
        </form>
    </div>

@endsection