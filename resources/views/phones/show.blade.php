@extends('layouts.app')
@section('meta-title','gestionar')
@section('color','success')

@section('content')
    <x-alert-static>
        <x-slot name="title">{{$phone->name}}</x-slot>
        <x-slot name="texto">Tiene {{$phone->ram}} :de ram</x-slot>
        <x-slot name="number">Tiene {{$phone->SSD}} :de SSD</x-slot>
    </x-alert-static>
    <div class="w-100 p-4 card shadow-lg">
        <b>name</b>
        <p>{{$phone->name}}</p>
        <a href="/telefonos/{{$phone->id}}/edit" class="btn btn-info w-25">EDITAR</a>
        <form action="/telefonos/{{$phone->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-25 mt-2">ELIMINAR</button>
        </form>
    </div>
@endsection