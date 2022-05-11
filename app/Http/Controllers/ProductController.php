<?php

namespace App\Http\Controllers;

use App\product;
use App\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        if (isset($request->identificador))
            $producto = product::find($request->identificador);
        else
            $producto = new product();

        $path = $request->file('image_path')->store('public');
        $file = basename($path);

        $producto->category_id = $request->category_id;
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->stock = $request->stock;
        $producto->price = $request->price;
        $producto->image_path = $file;

        $producto->save();

        if (isset($request->identificador))
            return redirect('/admin/inventario');

        return redirect()->back();
    }

    public function show()
    {
        $inventario = product::all();
        $categorias = category::all();
        return view('admin_inventario')->with('inventario', $inventario)->with('categorias', $categorias);
    }

    public function showProducts()
    {
        $inventario = product::all();
        $categorias = category::all();
        return view('products')->with('inventario', $inventario)->with('categorias', $categorias);
    }
    public function showOneProduct($category,$id)
    {
        $producto = product::find($id);
        // return dd($request);
        return view('product')->with('producto', $producto);
    }

    public function edit(Request $request)
    {
        if (isset($request->identificador)) {
            $producto = product::find($request->identificador);
            $path = $request->file('image_path')->store('public');
            $file = basename($path);

            $producto->category_id = $request->category_id;
            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->stock = $request->stock;
            $producto->price = $request->price;
            $producto->image_path = $file;

            $producto->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $producto = product::find($id);
        $producto->delete();
        return redirect('/admin/inventario');
    }

    public function showProduct($category)
    {
        $producto = product::find($category);

        return $producto;
    }
}
