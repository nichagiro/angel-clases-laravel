<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('meta-title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script defer src="{{asset('js/theme.js')}}"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-@yield('color')">
            <div class="container-fluid">
                <a class="navbar-brand">CURSO LARAVEL 8</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link {{request()->routeIs('/') ? 'active' : ''}}" aria-current="page" href="/">Inicio</a>
                        <a class="nav-link {{request()->routeIs('telefonos.*') ? 'active' : ''}}" href="/telefonos">Telefonos</a>
                        <a class="nav-link {{request()->routeIs('personas.*') ? 'active' : ''}}" href="/personas">Personas</a>
                    </div>
                    <div class="d-flex justify-content-end w-100">
                        <button id="theme" data-theme="claro" class="nav-link btn btn-dark">oscuro</button>
                    </div>
                </div>
            </div>
        </nav>
        <main class="p-5">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>    
    </body>
</html>

