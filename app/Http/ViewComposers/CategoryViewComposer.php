<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Category;

class CategoryViewComposer{
    public function compose(View $view){
        $web_categories = Category::where('parent_id', null)->get();
        $view->with (['web_categories' => $web_categories]);
    }
}