<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use Spatie\Tags\Tag;

class TagViewComposer{
    public function compose(View $view){
        $tags = Tag::orderBy('order_column', 'ASC')->get();
        $view->with (['web_tags' => $tags]);
    }
}