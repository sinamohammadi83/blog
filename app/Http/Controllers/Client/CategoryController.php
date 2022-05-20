<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Requests\Client\NewCategoryRequest;
use App\Http\Requests\Client\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissionMiddleware::class . ":read-category")
            ->only('index');
        $this->middleware(CheckPermissionMiddleware::class . ":create-category")
            ->only(['create','store']);
        $this->middleware(CheckPermissionMiddleware::class . ":update-category")
            ->only(['edit','update']);
        $this->middleware(CheckPermissionMiddleware::class . ":delete-category")
            ->only('destroy');
    }

    public function index()
    {
        return view('client.category.index',[
            'categories' => Category::all()->sortDesc()
        ]);
    }

    public function create()
    {
        return view('client.category.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(NewCategoryRequest $request)
    {
        Category::query()->create([
            'category_id' => $request->get('category'),
            'title' => $request->get('title')
        ]);

        return to_route('client.category.index');
    }

    public function edit(Category $category)
    {
        return view('client.category.edit',[
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    public function update(Category $category,UpdateCategoryRequest $request)
    {
        $category->update([
            'title' => $request->get('title') ,
            'category_id' => $request->get('category')
        ]);

        return to_route('client.category.index');
    }

    public function destroy(Category $category)
    {
        foreach ($category->posts()->get() as $post) {
            (new PostController)->destroy($post);
        }


        $category->delete();

        return to_route('client.category.index');
    }
}
