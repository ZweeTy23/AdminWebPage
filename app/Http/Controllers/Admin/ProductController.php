<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        // 1. ESENCIAL: Si no hay categoría seleccionada, regresa al menú de categorías.
        if (!\Session::has('category_id')) {
            return redirect('admin/category')->with('error', 'Selecciona una categoría primero.');
        }

        $products = Product::whereCategory_id(\Session::get("category_id"))->get();
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        // 2. ESENCIAL: Evita el error "category_id cannot be null"
        if (!\Session::has('category_id')) {
            return redirect('admin/category')->with('error', 'La sesión expiró, selecciona la categoría de nuevo.');
        }

        $product = new Product($request->all());

        if($request->hasFile('img')){
            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/product/');
            copy($img->getRealPath(), $route.$img_name);
            $product->img = $img_name;
        }

        $product->slug = Str::slug($request->name);

        // Asignamos el ID de la sesión (ahora seguro gracias al if de arriba)
        $product->category_id = \Session::get("category_id");

        $product->save();
        return redirect('admin/product')->with('success', 'Product Successfully Added');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        $img_previous = $product->img;
        $product->fill($request->all());

        if ($request->hasFile('img')) {
            $previous_path = public_path('img/product/' . $img_previous);
            if ((file_exists($previous_path))&& ($img_previous != null)) {
                unlink(realpath($previous_path));
            }

            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/product/');
            copy($img->getRealPath(), $route.$img_name);
            $product->img = $img_name;
        }
        $product->slug = Str::slug($request->name);
        $product->save();
        return redirect('admin/product')->with('success', 'Product Successfully Updated');
    }

    public function destroy($id){
        $product = Product::find($id);
        if(empty($product))
            return redirect('admin/product');
        $previous_path = public_path('img/product/' . $product->img);
        if (file_exists($previous_path)) {
            unlink(realpath($previous_path));
        }
        $product->delete();
        return redirect('admin/product')->with('success', 'Product Successfully Deleted');
    } //
}
