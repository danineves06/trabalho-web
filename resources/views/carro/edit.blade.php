@extends('templates.main')

@section('content')

    <form action="{{ route('carro.update', $carro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="mt-3">Placa</label>
        <input type="text" name="placa" class="form-control mt-3" value="{{ $carro->placa }}" />

        <label class="mt-3">Modelo</label>
        <select name="modelo_id" class="form-control">
            <option disabled selected>Selecione um modelo</option>
            @foreach ($modelos as $item)
                <option value="{{ $item->id }}" {{ $item->id == $carro->modelo_id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <label class="mt-3">Estado</label>
        <select name="estado_id" class="form-control">
            <option disabled selected>Selecione um estado</option>
            @foreach ($estados as $item)
                <option value="{{ $item->id }}" {{ $item->id == $carro->estado_id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <label class="mt-3">Cor</label>
        <select name="cor_id" class="form-control">
            <option disabled selected>Selecione uma cor</option>
            @foreach ($cors as $item)
                <option value="{{ $item->id }}" {{ $item->id == $carro->cor_id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <input type="submit" value="Alterar" class="btn btn-danger mt-2">

    </form>

@endsection
