@extends('layouts.master')

@section('breadcrumb')
    @include('categorias.parciales.breadcrumb', ['seccion' => 'Agregar'])
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <span class="caption-subject bold uppercase"> AGREGAR CATEGORIA</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ route('categorias.store') }}" method="POST" id="form">
                        @include('categorias.parciales.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app/categorias.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app/precios.js') }}" type="text/javascript"></script>
@endsection