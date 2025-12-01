<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Profile;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index(){
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create(){
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        // 1. Llenamos el modelo con los datos del formulario
        $slide = new Slide($request->all());

        // 2. Procesamos la imagen si existe
        if($request->hasFile('img')){
            $img = $request->file('img');

            // CORRECCIÓN: Usamos 'phrase' porque es lo que envia tu formulario HTML
            // Si usas 'name', dará error o quedará vacío el nombre del archivo.
            $img_name = Str::slug($request->phrase) . '.' . $img->guessExtension();

            $route = public_path('img/slide/');
            copy($img->getRealPath(), $route.$img_name);
            $slide->img = $img_name;
        }


        $slide->save();
        return redirect('admin/slide')->with('success', 'Page Successfully Added');
    }

    public function edit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }

    public function update(Request $request, $id){

        $slide = Slide::find($id);
        $img_previous = $slide->img;

        $slide->fill($request->all());

        if ($request->hasFile('img')) {
            $previous_path = public_path('img/slide/' . $img_previous);
            if ((file_exists($previous_path)) && ($img_previous != null)) {
                unlink(realpath($previous_path));
            }
            $img = $request->file('img');
            $img_name = Str::slug($request->phrase) . '.' . $img->guessExtension();
            $route = public_path('img/slide/');
            copy($img->getRealPath(), $route.$img_name);
            $slide->img = $img_name;
        }

        $slide->save();
        return redirect('admin/slide')->with('success', 'Slide Successfully Updated');
    }

    public function destroy($id){
        $slide = Slide::find($id);
        if(empty($slide))
            return redirect('admin/slide');
        $previous_path = public_path('img/slide/' . $slide->img);
        if (file_exists($previous_path)) {
            unlink(realpath($previous_path));
        }

        $slide->delete();
        return redirect('admin/slide')->with('success', 'Slide Successfully Deleted');
    }
}
