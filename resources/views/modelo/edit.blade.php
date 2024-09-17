@extends('templates.main')

@section('content')

    <form action="{{route('modelo.update', $modelo->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control mt-3" value="{{$modelo->name}} "/>

        <select name="marca" class="form-control">
            <optinon disable></option>
            @foreach ($marcas as $item)

            @if($item->id == $modelo->marca_id)
            <option value="{{$item->id}}" selected>{{ $item->name }}</option>
            @else
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endif
        @endforeach
        <input type="submit" value="Alterar" class="btn btn-danger mt-2">

    </select>
    </form>

@endsection
