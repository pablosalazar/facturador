<?php

if(Session::has('precios'))
{
    $precios = Session::get('precios');
}
else {
    $precios = [];
}
?>

<p class="text-muted text-right">
    Los campos marcados con (<span class="f_req">*</span>) deben ser llenados de manera obligatoria, los demas campos son opcionales.
</p>

@include('layouts.errores')

{{ Form::token() }}
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombre">Catégoria <span class="f_req">*</span></label>
                {{ Form::text('nombre', null,  ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-md-checkboxes">
                <label></label>
                <div class="md-checkbox-list">
                    <div class="md-checkbox has-success">
                        {{ Form::checkbox('ckb_precios', 1, null, ['class' => 'md-check', 'id' => 'ckb_precios']) }}
                        <label for="ckb_precios">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Agregar precios por catégoria</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="config" style="display: none">
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
                @foreach($precios as $precio)
                    @include('precios.campos-precio', $precio)
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="form-actions noborder text-right">
    <button class="btn blue btn-guardar">Guardar</button>
    <a href="{{ url('categorias')  }}" class="btn default">Regresar</a>
</div>