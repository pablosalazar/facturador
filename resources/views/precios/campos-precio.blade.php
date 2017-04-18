<?php

    if( !isset($precio) )
    {
            $precio = new \App\Precio();
    }
?>

<div class="row bg-white padding-tb-10 margin-top-10 fila-precio">

    <div class="col-md-5">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="precios[referencia][]" value="{{ $precio->referencia }}" class="form-control">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Precio de venta <span class="f_req">*</span></label>
            <input type="text" name="precios[venta][]" value="{{ $precio->venta }}" class="form-control text-right" placeholder="$">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Precio de costo</label>
            <input type="text" name="precios[costo][]" value="{{ $precio->costo }}" class="form-control text-right" placeholder="$">
        </div>
    </div>
    <div class="col-md-3 text-center">
        <br>
        <a href="javascript:;" class="btn btn-circle btn-icon-only red btn-borrar">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </div>
</div>