@extends('layouts.app')
@section('meta-title','telefonos')
@section('color','info')

@section('content')
    <x-alert-phones :status="session('status')"></x-alert-phones>
    <a href="/telefonos/create" class="btn btn-info mb-3">Crear</a>
    <div class="row justify-content-around">
        @foreach ($phones as $phone)
        @php
            $cont++
        @endphp
            <div class="card text-white bg-danger m-3 col-3">
                <div class="card-header">NOMBRE: {{$phone->name}} - {{$cont}}</div>
                <div class="card-body">
                    <h5 class="card-title">RAM: {{$phone->ram}}</h5>
                    <p class="card-text">SSD: {{$phone->SSD}}</p>
                </div>
                <div class="footer p-4">
                    <a href="/telefonos/{{$phone->id}}" class="btn btn-success"> Gestionar </a>
                </div>
            </div>  
        @endforeach
    </div>   
@endsection
