<?php

namespace App;


use Validator;

class Categoria extends Base
{
    protected $fillable = ['nombre'];

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }

    public function precios()
    {
        return $this->hasMany('App\Precio');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

    public function validar($datos = []) {
        $reglas = [
            'nombre' => 'required|unique:categorias',
            'precios.venta.*'=>'nullable|numeric',
            'precios.costo.*'=>'nullable|numeric'
        ];

        if ($this->exists) {
            $reglas['nombre'] .= ',nombre,' . $this->id;
        }

        $mensajes = [
            'nombre.unique' => 'El campo catégoria es obligatorio',
            'nombre.unique' => 'Ya existe una catégoria registrada con este nombre.',
            'precios.venta.*.required' => 'El campo precio de venta es obligatorio.',
            'precios.venta.*.numeric' => 'El precio de venta solo debe tener números.',
            'precios.costo.*.numeric' => 'El precio de costo solo debe tener números.',
        ];

        $validator = Validator::make($datos, $reglas, $mensajes);

        if ($validator->passes()) {
            return true;
        }
        $this->errores = $validator->errors();
        return false;
    }

}
