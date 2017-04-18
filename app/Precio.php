<?php

namespace App;

use Validator;

class Precio extends Base
{
    protected $fillable = ['categoria_id', 'producto_id', 'venta', 'costo', 'referencia'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function setReferenciaAttribute($value)
    {
        $this->attributes['referencia'] = ucfirst(strtolower($value));
    }


    public function validar($datos = []) {
        $reglas = [
            'venta' => 'required'
        ];

        if ($this->exists) {

        }

        $mensajes = [
            'venta.required' => 'Ingrese el campo precio de venta'
        ];

        $validator = Validator::make($datos, $reglas, $mensajes);

        if ($validator->passes()) {
            return true;
        }
        $this->errores = $validator->errors();
        return false;
    }


    public static function getPostPrecios($datos = [], $omitirVacios = false)
    {
        $precios = [];

        if( count($datos) )
        {
            if( $omitirVacios == false )
            {
                for ($i = 0; $i < count($datos['venta']); $i++)
                {
                    $precio = new Precio();

                    $precio->venta = $datos['venta'][$i];
                    $precio->costo = $datos['costo'][$i];
                    $precio->referencia = $datos['referencia'][$i];

                    $precios[] = $precio;
                }
            }
            else
            {
                for ($i = 0; $i < count($datos['venta']); $i++)
                {
                    if( !empty($datos['venta'][$i]) or !empty($datos['costo'][$i]) or !empty($datos['referencia'][$i])){
                        $precio = new Precio();

                        $precio->venta = $datos['venta'][$i];
                        $precio->costo = $datos['costo'][$i];
                        $precio->referencia = $datos['referencia'][$i];

                        $precios[] = $precio;
                    }
                }
            }
        }
        return $precios;
    }
}
