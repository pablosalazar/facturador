@extends('layouts.master')

@section('breadcrumb')
    @include('categorias.parciales.breadcrumb')
@endsection

@section('contenido')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject bold uppercase"> LISTA DE CATEGORIAS</span>
            </div>
            <div class="text-right">
                <a href="{{ route('categorias.create') }}" class="btn green-turquoise"><i class="fa fa-plus"></i> Agregar</a>
            </div>
        </div>
        <div class="portlet-body">
            <?php $cont = 0; ?>
            @if(count($lista))
                <table class="table table-bordered table-hover table-header-fixed" id="tabla">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Categoria</th>
                        <th># Productos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <tbody>
                    @foreach($lista as $item)
                        <?php $cont++; ?>
                        <tr>
                            <td class="td-num">{{$cont}}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ count($item->productos)}}</td>
                            <td><a href=" {{ route('categorias.edit', $item->id) }} ">Editar</a></td>
                            <td><a href="javascript:;" data-id="{{ $item->id }}" class="btn-borrar">Eliminar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning" role="alert">
                    No hay catégorias registradas.
                </div>
            @endif
        </div>
    </div>

    {{ Form::open(['route' => ['categorias.destroy', 'ID'], 'method' => 'DELETE', 'id'=>'form-borrar']) }}

    {{ Form::close() }}
@endsection

@section('scripts')
    <script src="{{ asset('js/app/categorias.js') }}" type="text/javascript"></script>
@endsection