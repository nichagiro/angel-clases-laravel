@extends('layouts.app')
@section('meta-title','gestionar')
@section('color','success')

@section('content')
    <div class="card mb-3 mx-auto" style="max-width: 540px;">
        <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$people[0]['img']}}" alt="img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{$people[0]['name']}}</h5>
            <p class="card-text text-white"><small>{{$people[0]['slug']}}</small></p>
            </div>
        </div>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info w-25 mx-3" href="{{route('personas.edit', $people[0]['slug'])}}"> Editar </a>
            <form action="{{ route('personas.destroy', $people[0]['id']) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@endsection