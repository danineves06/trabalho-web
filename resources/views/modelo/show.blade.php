@extends('templates.main')

@section('content')

        <legend class="list-group-item active" aria-current="true">{{$modelo->name}}</legend>
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control mt-3" value="{{$modelo->name}}" disabled/>
        <ul class="list-group mt-2">
            <p class="card-text">
                <b>Marca: </b> {{$modelo->marca->name}}
        </p>

        <a href="{{route('modelo.index')}}"  class="btn btn-danger mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
            </svg>
        </a>


@endsection
