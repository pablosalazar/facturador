<h1>Categorías</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ url('/') }}">Inicio</a>
    </li>
    @if(isset($seccion))
        <li>
            <a href="{{ url('categorias') }}">Categorias</a>
        </li>
        <li class="active">{{ $seccion }}</li>
    @else
        <li class="active">Categorias</li>
    @endif
</ol>