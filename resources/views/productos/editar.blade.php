@extends('layouts.master')

@section('breadcrumb')
    @include('productos.parciales.breadcrumb', ['seccion' => 'Editar'])
@endsection

@section('contenido')

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject bold uppercase"> EDITAR PRODUCTO</span>
            </div>
            <div class="text-right">
                <a href="{{ url('productos')  }}" class="btn default">Regresar</a>
            </div>
        </div>
        <div class="portlet-body form">

            {{ Form::model($producto, ['route' => ['productos.update',$producto->id], 'method' => 'PATCH', 'id'=>'form']) }}
                @include('productos.parciales.form')
            {{ Form::close() }}
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/app/productos.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app/precios.js') }}" type="text/javascript"></script>
@endsection