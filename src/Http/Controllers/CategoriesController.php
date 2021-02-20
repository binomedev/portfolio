<?php


namespace Binomedev\Portfolio\Http\Controllers;

use App\Http\Controllers\Controller;
use Binomedev\Portfolio\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('order')->paginate();

        return view('portfolio::categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('portfolio::categories.show', compact('category'));
    }
}
