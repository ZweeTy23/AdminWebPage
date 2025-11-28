<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        // ELIMINA "compact('slides')". No necesitas enviar la lista para CREAR uno nuevo.
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image',
            'phrase' => 'nullable|string|max:190',
            'position' => 'required|numeric',
            'link' => 'nullable|url',
        ]);

        $slide = new Slide();
        $slide->phrase = $request->phrase;
        $slide->position = $request->position;
        $slide->link = $request->link;

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $img_name = time() . '.' . $img->getClientOriginalExtension();
            $ruta = public_path('img/slide/');
            $img->move($ruta, $img_name);
            $slide->img = $img_name;
        }

        $slide->save();

        return redirect('admin/slide')->with('success', 'Slide Successfully Added');
    }

    public function edit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }
    public function update(Request $request, $id){

        $slide = Slide::find($id);
        $slide->fill($request->all());
        $img_previous = $slide->img;

        if ($request->hasFile('img')) {
            $previous_path = public_path('img/slide/' . $img_previous);
            if ((file_exists($previous_path))&& ($img_previous != null)) {
                unlink(realpath($previous_path));
            }

            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
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
