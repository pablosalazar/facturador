<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Precio;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $lista = Producto::all();
        return view('productos.index', compact('lista'));
    }

    public function create()
    {
        $categorias = Categoria::all()->pluck('nombre','id');
        return view('productos.agregar', compact('categorias'));
    }


    public function store(Request $request)
    {
        $producto = new Producto();

        $precios = Precio::getPostPrecios($request->input("precios"));

        if( $producto->guardar($request->all()) )
        {
            $producto->precios()->saveMany($precios);
            return redirect()->route('productos.index');
        }
        $request->session()->flash('precios', $precios);
        return back()->withInput()->withErrors($producto->errores);
    }

    public function show($id)
    {
        //
    }


    public function edit(Request $request, Producto $producto)
    {
        $precios = $producto->precios;
        $categorias = Categoria::all()->pluck('nombre','id');
        $categorias->prepend('Sin catégoria','Sin categoria');

        $request->session()->flash('precios', $precios);
        return view('productos.editar', compact('categorias', 'producto'));
    }


    public function update(Request $request, Producto $producto)
    {
        $precios = Precio::getPostPrecios($request->input("precios"));

        if( $producto->guardar($request->all()) )
        {
            Precio::where('producto_id', $producto->id)->delete();
            $producto->precios()->saveMany($precios);
            return redirect()->route('productos.index');
        }
        $request->session()->flash('precios', $precios);
        return back()->withInput()->withErrors($producto->errores);
    }

    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('productos.index');
    }

    /*Metodos personalizados*/

    public function cargarPreciosCategoria(Request $request)
    {
        $categoria = Categoria::find($request->input('categoria_id'));
        $precios = $categoria->precios;
        foreach (Precio::getPostPrecios($request->input("precios"), false) as $precio)
        {
            $precios[] = $precio;
        }
//        $precios[] = Precio::getPostPrecios($request->input("precios"));
        $request->session()->flash('precios', $precios);
        return back()->withInput();
    }

    
}
