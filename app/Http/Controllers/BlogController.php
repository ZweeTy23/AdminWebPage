<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page; // Asegúrate de tener esto
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $posts = Post::all();
        $page = Page::find(2); // Tú usas el ID 2

        // CORRECCIÓN: Aquí es donde el tutorial falló, tú sí pon 'page'
        return view('front.blog.index', compact('posts', 'page'));
    }

    public function post(Post $post){
        $post->increment("visits");
        $posts = Post::whereNotIn('id', [$post->id])->take(3)->get();
        return view('front.blog.post', compact('posts', 'post'));
    }
}
