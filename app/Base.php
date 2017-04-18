<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


abstract class Base extends Model
{
    public $errores;
    abstract protected function validar($datos = []);

    public function guardar($datos)
    {
        if ($this->validar($datos)) {
            $this->fill($datos);
            $this->save();
            return true;
        }
    }
}
