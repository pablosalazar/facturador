@extends('layouts.master')

@section('breadcrumb')
    @include('productos.parciales.breadcrumb')
@endsection

@section('contenido')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject bold uppercase"> LISTA DE PRODUCTOS</span>
            </div>
            <div class="text-right">
                <a href="{{ route('productos.create') }}" class="btn green-turquoise"><i class="fa fa-plus"></i> Agregar</a>
            </div>
        </div>
        <div class="portlet-body">
            <?php $cont = 0; ?>
            @if(count($lista))
                <table class="table table-bordered table-hover table-header-fixed" id="tabla">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Catégoria - Producto</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    <tbody>
                    @foreach($lista as $item)
                        <?php $cont++; ?>
                        <tr>
                            <td class="td-num">{{$cont}}</td>
                            <td>{{ $item->categoria?$item->categoria->nombre:'' }} {{$item->nombre}}</td>
                            <td><a href=" {{ route('productos.edit', $item->id) }} ">Editar</a></td>
                            <td><a href="javascript:;" data-id="{{ $item->id }}" class="btn-borrar">Eliminar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                    <div class="alert alert-warning" role="alert">
                        No hay productos registrados.
                    </div>
            @endif
        </div>
    </div>

    {{ Form::open(['route' => ['productos.destroy', 'PRODUCTO_ID'], 'method' => 'DELETE', 'id'=>'form-borrar']) }}

    {{ Form::close() }}

@endsection

@section('scripts')
    <script src="{{ asset('js/app/productos.js') }}" type="text/javascript"></script>
@endsection