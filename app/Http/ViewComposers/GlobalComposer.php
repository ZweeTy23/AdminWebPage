<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Contracts\View\View;

class GlobalComposer{
    public function compose(View $view){
        $menu = Category::all(["slug", "name"]);
        $profile = Profile::find(1);
        $view->with('menu', $menu)->with('profile', $profile);
    }
}
