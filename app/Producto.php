<?php

namespace App;

use Validator;

class Producto extends Base
{

    protected $fillable = ['categoria_id', 'nombre'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function precios()
    {
        return $this->hasMany('App\Precio');
    }
    
    public function setCategoriaIdAttribute($value)
    {
        if($value == 'Sin categoria'){
            $value = null;
        }
        $this->attributes['categoria_id'] = $value;
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

    

    public function validar($datos = []) {
        $reglas = [
            'categoria_id' => 'required',
            'nombre' => 'required|unique:productos',
            'precios.venta.*'=>'required|numeric',
            'precios.costo.*'=>'nullable|numeric'
        ];

        if ($this->exists) {
            $reglas['nombre'] .= ',nombre,' . $this->id;
        }

        $mensajes = [
            'categoria_id.required' => 'Selecciona una opción en el campo categoria.',
            'nombre.required' => 'Ingresa el nombre del producto.',
            'nombre.unique' => 'Ya existe un producto registrado con este nombre.',
            'precios.venta.*.required' => 'Ingresa el valor del precio de venta.',
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
