<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }
    public function create(){
        // ELIMINA "compact('pages')". No necesitas enviar la lista para CREAR uno nuevo.
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
 $page = new Page($request->all());
 if($request->hasFile('img')){
     $img = $request->file('img');
     $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
     $route = public_path('img/page/');
     copy($img->getRealPath(), $route.$img_name);
     $page->img = $img_name;
 }
        $page->slug = Str::slug($request->name);
        $page->save();
        return redirect('admin/page')->with('success', 'Page Successfully Added');
    }

    public function edit($id){
        $page = Page::find($id);
        return view('admin.page.edit',compact('page'));
    }
    public function update(Request $request, $id){

        $page = Page::find($id);
        $img_previous = $page->img;
        $page->fill($request->all());


        if ($request->hasFile('img')) {
            $previous_path = public_path('img/page/' . $img_previous);
            if ((file_exists($previous_path))&& ($img_previous != null)) {
                unlink(realpath($previous_path));
            }

            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/page/');
            copy($img->getRealPath(), $route.$img_name);
            $page->img = $img_name;
        }
        $page->slug = Str::slug($request->name);
        $page->save();
        return redirect('admin/page')->with('success', 'Page Successfully Updated');
    }
    public function destroy($id){
        $page = Page::find($id);
        if(empty($page))
            return redirect('admin/page');
        $previous_path = public_path('img/page/' . $page->img);
        if (file_exists($previous_path)) {
            unlink(realpath($previous_path));
        }
        $page->delete();
        return redirect('admin/page')->with('success', 'Page Successfully Deleted');
    } //
}
