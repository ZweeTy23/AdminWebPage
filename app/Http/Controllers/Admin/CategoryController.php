<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use MongoDB\Driver\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        // ELIMINA "compact('categories')". No necesitas enviar la lista para CREAR uno nuevo.
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category($request->all());
        if($request->hasFile('img')){
            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/category/');
            copy($img->getRealPath(), $route.$img_name);
            $category->img = $img_name;
        }
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('admin/category')->with('success', 'Category Successfully Added');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function show($id){
        \Session::put("category_id", $id);
        return redirect("admin/product");
    }

    public function update(Request $request, $id){

        $category = Category::find($id);
        $img_previous = $category->img;
        $category->fill($request->all());


        if ($request->hasFile('img')) {
            $previous_path = public_path('img/category/' . $img_previous);
            if ((file_exists($previous_path))&& ($img_previous != null)) {
                unlink(realpath($previous_path));
            }

            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/category/');
            copy($img->getRealPath(), $route.$img_name);
            $category->img = $img_name;
        }
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('admin/category')->with('success', 'Category Successfully Updated');
    }
    public function destroy($id){
        $category = Category::find($id);
        if(empty($category))
            return redirect('admin/category');
        $previous_path = public_path('img/category/' . $category->img);
        if (file_exists($previous_path)) {
            unlink(realpath($previous_path));
        }
        $category->delete();
        return redirect('admin/category')->with('success', 'Category Successfully Deleted');
    } //
}
