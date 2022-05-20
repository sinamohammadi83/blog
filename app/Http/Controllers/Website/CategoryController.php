<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts =  $category->onposts();

        return view('website.category.show',[
            'posts' => $posts,
            'category' => $category
        ]);
    }
}
