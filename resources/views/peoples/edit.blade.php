@extends('layouts.app')
@section('meta-title','Crear')
@section('color','warning')

@section('content')
<div class="d-flex justify-content-center">
    @foreach ($people as $persona)
    <form action="/personas/{{$persona->slug}}" class="w-50" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="card shadow" style="width: 40%;">
                <span class="alert-danger text-danger">
                    @foreach ($errors->all() as $error)  
                        <ul>
                            <li>*{{$error}}</li>
                        </ul>            
                    @endforeach
                </span>
            </div>
        @endif
        <div>
            <label >Nombre:</label>
            <input name="name" type="text" class="form-control" value="{{old('name',$persona->name)}}">
        </div>
        <div>
            <label >img:</label>
            <input name="img" type="file" class="form-control">
        </div>
        <div class="my-4">
            <label >Seleccione el trabajo:</label>
            <select name="job" class="form-select" aria-label="Default select example">
                <option value="{{$persona->id_jobs}}" selected>{{$persona->name_jobs}}</option>
                @foreach ($jobs as $job)
                    <option value="{{$job->id}}">{{$job->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="submit btn btn-info text-white">ENVIAR</button>
    </form>
    @endforeach
    <div>
        <img src="{{$persona->img}}">
    </div>
</div>
@endsection
