@extends('templates.main')

@section('content')

    <form action="{{route('cor.update', $cor->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control mt-3" value="{{$cor->name}}"/>
        <input type="submit" value="Alterar" class="btn btn-danger mt-2">
    </form>

@endsection
