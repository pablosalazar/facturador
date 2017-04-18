<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Precio;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $lista = Categoria::all();
        return view('categorias.index', compact('lista'));
    }

    public function create()
    {
        return view('categorias.agregar');
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $precios = Precio::getPostPrecios($request->input("precios"));

        if( $categoria->guardar($request->all()) )
        {
            $categoria->precios()->saveMany($precios);
            return redirect()->route('categorias.index');
        }
        $request->session()->flash('precios', $precios);
        return back()->withInput()->withErrors($categoria->errores);
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, Categoria $categoria)
    {
        $precios = $categoria->precios;
        if( count($precios)) {
            $categoria->ckb_precios = 1;
        }
        $request->session()->flash('precios', $precios);
        return view('categorias.editar', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $precios = Precio::getPostPrecios($request->input("precios"));
        if( $categoria->guardar($request->all()) )
        {
            Precio::where('categoria_id', $categoria->id)->delete();
            $categoria->precios()->saveMany($precios);
            return redirect()->route('categorias.index');
        }
        $request->session()->flash('precios', $precios);
        return back()->withInput()->withErrors($categoria->errores);
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect()->route('categorias.index');
    }
}
