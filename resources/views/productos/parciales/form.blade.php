<?php

    if(!Session::has('precios'))
    {
        $precios = [];
    }
    else {
        $precios = Session::get('precios');
    }

    $categorias->prepend('Sin catégoria','Sin categoria');
?>

<p class="text-muted text-right">
    Los campos marcados con (<span class="f_req">*</span>) deben ser llenados de manera obligatoria, los demas campos son opcionales.
</p>

@include('layouts.errores')

{{ Form::token() }}
<div class="form-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="categoria">Catégoria <span class="f_req">*</span></label>
                {{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'id' => 'categorias']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre">Nombre del producto <span class="f_req">*</span></label>
                {{ Form::text('nombre', null,  ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div id="config">
        <div class="well green">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="block">Agregar precios
                        <a href="javascript:;" class="btn btn-circle btn-icon-only green" id="btn-agregar">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h4>
                </div>
            </div>
            <div id="filas">
                @if(count($precios) == 0)
                    @include('precios.campos-precio')
                @endif
                @foreach($precios as $precio)
                    @include('precios.campos-precio', $precio)
                @endforeach
            </div>
        </div>
    </div>

</div>
<div class="form-actions noborder text-right">
    <button type="submit" class="btn blue" id="btn-guardar">Guardar</button>
    <a href="{{ url('productos')  }}" class="btn default">Regresar</a>
</div>