@extends('templates.main')

@section('content')

    <form action="{{route('carro.store')}}" method="POST">
        @csrf
        <label class="mt-3">Placa</label>
            <input type="text"name="placa" value="{{old('placa')}}" class="form-control mt-3"/>
        <label class="mt-3">Modelo</label>
        <select name="modelo_id" class="form-control">
            <option selected disable></option>
            @foreach ($modelos as $item)
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        <label class="mt-3">Estados</label>
        <select name="estado_id" class="form-control">
            <option selected disable></option>
            @foreach ($estados as $item)
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        <label class="mt-3">Cor</label>
        <select name="cor_id" class="form-control">
            <option selected disable></option>
            @foreach ($cors as $item)
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="salvar" class="btn btn-danger mt-2">
    </form>

@endsection

