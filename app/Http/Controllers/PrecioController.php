<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    public function getPreciosCategoria($id)
    {
        $categoria = Categoria::find($id);

        if(!is_null($categoria))
        {
            $precios = $categoria->precios;
            if(count($precios))
            {
                return $precios->toArray();
            }
        }

        $precio = new Precio();
        $precio->referencia = "";
        $precio->venta = "";
        $precio->costo = "";
        return [$precio];
    }
}
