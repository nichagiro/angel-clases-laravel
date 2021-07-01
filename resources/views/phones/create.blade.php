@extends('layouts.app')
@section('meta-title','Crear')
@section('color','warning')

@section('content')
    <form action="/telefonos" method="post">
        @csrf
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
            @error('tipsphones_id')
                <small class="text-danger">Este campo debe de ser un numero y no debe de estar vacio</small>
            @enderror
            <b>Forranea:</b>
            <input name="tipsphones_id" class="form-control w-25 mb-3" type="number" value="{{old('tipsphones_id')}}">
        </div>
        <div>
            @error('name')
            <small class="text-danger">Este campo debe no debe de estar vacio</small>
            @enderror
            <b>NOMBRE:</b>
            <input name="name" class="form-control w-25 mb-3" type="text" value="{{old('name')}}">
        </div>
        <div>
            @error('ram')
            <small class="text-danger">Este campo debe no debe de estar vacio y debe ser un numero</small>
            @enderror
            <b>RAM</b>
            <input name="ram" class="form-control w-25 mb-3" type="number" value="{{old('ram')}}">
        </div>
        <div>
            @error('SSD')
            <small class="text-danger">Este campo debe no debe de estar vacio y debe ser un numero</small>
            @enderror
            <b>SSD</b>
            <input name="SSD" class="form-control w-25 mb-3" type="number" value="{{old('SSD')}}">
        </div>
        <div>
            @error('color')
            <small class="text-danger">Este campo es requerido</small>
            @enderror
            <b>COLOR</b>
            <input name="color" class="form-control w-25 mb-3" type="color" value="{{old('color')}}">
        </div>
        <button class="submit btn btn-info text-white">ENVIAR</button>
    </form>
@endsection
