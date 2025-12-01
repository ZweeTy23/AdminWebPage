<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $slides =Slide::all();
        $categories =Category::all(); //menu Bool 1/0
        $products =Product::orderbyDesc("visits")->take(3)->get();
        return view('welcome', compact('slides', 'categories', 'products'));
    }
    public function enterprise(){
        $data= Page::find(1);
        return view('front.enterprise',compact('data'));
    }

    public function category(category $category){
        return view('front.category', compact('category'));
    }


    public function product(category $category, Product $product){
        $product-> increment("visits");
        return view('front.product', compact('category', 'product'));
    }
    public function contact(){
        return view('front.contact');
    }
}
