<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $categorias = category::all();
        return view('admin_inventario')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        if (isset($request->identificador))
            $categoria = category::find($request->identificador);
        else
            $categoria = new category();
        
        $categoria->name = $request->category;

        $categoria->save();

        if (isset($request->identificador))
            return redirect('/admin/inventario');

        return redirect()->back();
    }
}
