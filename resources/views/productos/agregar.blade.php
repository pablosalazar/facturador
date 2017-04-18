@extends('layouts.master')

@section('breadcrumb')
    @include('categorias.parciales.breadcrumb', ['seccion' => 'Agregar'])
@endsection

@section('contenido')

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject bold uppercase"> AGREGAR PRODUCTO</span>
            </div>
            <div class="text-right">
                <a href="{{ url('productos')  }}" class="btn default">Regresar</a>
            </div>
        </div>
        <div class="portlet-body form">
            <form action="{{ route('productos.store') }}" method="POST" id="form">
                @include('productos.parciales.form')
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/app/productos.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app/precios.js') }}" type="text/javascript"></script>
@endsection