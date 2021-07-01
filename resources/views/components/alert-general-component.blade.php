@if (session('status'))
    <div class="alert alert-{{$bg}} alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong>
        <p> {{$name}} - {{$msg}} </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif