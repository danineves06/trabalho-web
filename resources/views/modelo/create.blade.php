@extends('templates.main')

@section('content')

    <form action="{{route('modelo.store')}}" method="POST">
        @csrf
        <label class="mt-3">Nome</label>
            <input type="text"name="name" value="{{old('name')}}" class="form-control mt-3"/>
        <label class="mt-3">Marca</label>
        <select name="marca_id" class="form-control">
            <option selected disable></option>
            @foreach ($marcas as $item)
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="salvar" class="btn btn-danger mt-2">
    </form>

@endsection

