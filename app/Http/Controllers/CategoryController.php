<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::findOrFail($id);

        $articles = $category->articles()
            ->orderBy('sort','desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('default.category_article', compact('articles', 'category'));
    }
}
