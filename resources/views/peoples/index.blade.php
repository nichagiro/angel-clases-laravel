@extends('layouts.app')
@section('meta-title','personas')
@section('color','danger')
@section('content')
<x-alert-general-component :status="session('status')" :bg="session('bg')" :name="session('name')" :msg="session('msg')"></x-alert-general-component>
    <a href="/personas/create" class="btn btn-success mb-3">Crear</a>
    <div class="row justify-content-around">
        @foreach ($peoples as $people)
            <div class="card text-white shadow m-3 col-3">
                <div class="card-header">{{$people->name}}</div>
                <div>
                    <img src="{{asset($people->img)}}" class="img-fluid">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$people->name_jobs}}</h5>
                </div>
                <div class="footer p-4">
                    <a href="{{ route('personas.show', $people->slug) }}" class="btn btn-dark"> Gestionar </a>
                </div>
            </div>     
        @endforeach
    </div>   
    {{$peoples->links('pagination::bootstrap-4')}}
@endsection
