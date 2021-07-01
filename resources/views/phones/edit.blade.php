@extends('layouts.app')
@section('meta-title','editar')
@section('color','danger')

@section('content')
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
    <form action="/telefonos/{{$phone->id}}" method="post">
        @csrf
        @method('PUT')
        <b>Forranea:</b>
        <input name="tipsphones_id" class="form-control w-25 mb-3" type="number" value="{{old('tipsphones_id',$phone->tipsphones_id)}}">
        <b>NOMBRE:</b>
        <input name="name" class="form-control w-25 mb-3" type="text" value="{{old('name',$phone->name)}}">
        <b>RAM</b>
        <input name="ram" class="form-control w-25 mb-3" type="number" value="{{old('ram',$phone->ram)}}">
        <b>SSD</b>
        <input name="SSD" class="form-control w-25 mb-3" type="number" value="{{old('SSD',$phone->SSD)}}">
        <b>COLOR</b>
        <input name="color" class="form-control w-25 mb-3" type="color" value="{{old('color',$phone->color)}}">
        <button class="submit btn btn-info text-white">Actualizar</button>
    </form>
@endsection