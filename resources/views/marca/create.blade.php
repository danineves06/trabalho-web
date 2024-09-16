@extends('templates.main')

@section('content')

    <form action="{{route('marca.store')}}" method="POST">
        @csrf
        <label class="mt-3">Nome</label>
        <input type="text"name="name" value="{{old('name')}}" class="form-control mt-3"/>

        <input type="submit" value="salvar" class="btn btn-danger mt-2">
    </form>

@endsection
