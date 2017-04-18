<h1>Productos</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ url('/') }}">Inicio</a>
    </li>
    @if(isset($seccion))
        <li>
            <a href="{{ url('productos') }}">Productos</a>
        </li>
        <li class="active">{{ $seccion }}</li>
    @else
        <li class="active">Productos</li>
    @endif
</ol>