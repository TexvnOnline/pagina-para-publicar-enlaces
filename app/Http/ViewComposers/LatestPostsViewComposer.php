<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Post;

class LatestPostsViewComposer{
    public function compose(View $view){
        $web_posts = Post::latest()->with('category')->take(8)->get();
        $view->with (['web_posts' => $web_posts]);
    }
}


