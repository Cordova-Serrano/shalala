<?php

namespace App\Http\Controllers;

use App\product;
use App\User;
use App\ProductsByCar;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ProductsByCarController extends Controller
{
    public function show($id)
    {
        $cart = ProductsByCar::where('user_id', $id)->get();
        return view('cart')->with('cart', $cart);
    }

    public function addToCart(Request $request)
    {
        $user = User::find($request->user_id);
        $product = product::find($request->product_id);
        $cart = ProductsByCar::where('user_id', $user->id)->where('product_id', $product->id)->get();

        if (count($cart) == 0) {
            echo '<script>';
            echo 'console.log(' . json_encode($cart) . ');';
            echo 'console.log("Este producto es nuevo");';
            echo '</script>';

            $cart = new ProductsByCar();

            $cart->user_id = $request->user_id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        } else {
            echo '<script>';
            echo 'console.log(' . json_encode($cart) . ');';
            echo 'console.log("Ya existe este producto");';
            echo '</script>';

            foreach ($cart as $c) {
                $c->quantity = $request->quantity;
                $c->save();
            }
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $producto = ProductsByCar::find($id);
        $producto->delete();
        return redirect()->back();
    }

    public function destroyCart($user_id)
    {
        $producto = ProductsByCar::where('id', $user_id)->get(); //Obtenemos todos los carritos del usuario
        $producto->delete();
        // return redirect()->back();
    }

    public function update()
    {
    }
}
