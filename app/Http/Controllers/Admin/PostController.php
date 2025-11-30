<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){

        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $post = new Post($request->all());
        if($request->hasFile('img')){
            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/post/');
            copy($img->getRealPath(), $route.$img_name);
            $post->img = $img_name;
        }

        $post->slug = Str::slug($request->name);
        $post->save();
        return redirect('admin/post')->with('success', 'Post Successfully Added');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
    }

    public function update(Request $request, $id){

        $post = Post::find($id);
        $img_previous = $post->img;
        $post->fill($request->all());

        if ($request->hasFile('img')) {
            $previous_path = public_path('img/post/' . $img_previous);
            if ((file_exists($previous_path))&& ($img_previous != null)) {
                unlink(realpath($previous_path));
            }

            $img = $request->file('img');
            $img_name = Str::slug($request->name) . '.' . $img->guessExtension();
            $route = public_path('img/post/');
            copy($img->getRealPath(), $route.$img_name);
            $post->img = $img_name;
        }
        $post->slug = Str::slug($request->name);
        $post->save();
        return redirect('admin/post')->with('success', 'Post Successfully Updated');
    }

    public function destroy($id){
        $post = Post::find($id);
        if(empty($post))
            return redirect('admin/post');
        $previous_path = public_path('img/post/' . $post->img);
        if (file_exists($previous_path)) {
            unlink(realpath($previous_path));
        }
        $post->delete();
        return redirect('admin/post')->with('success', 'Post Successfully Deleted');
    } //
}
