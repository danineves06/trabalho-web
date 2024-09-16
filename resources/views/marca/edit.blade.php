@extends('templates.main')

@section('content')

    <form action="{{route('marca.update', $marca->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control mt-3" value="{{$marca->name}}"/>
        <input type="submit" value="Alterar" class="btn btn-danger mt-2">
    </form>

@endsection


