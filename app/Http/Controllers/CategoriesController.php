<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class CategoriesController extends Controller
{
    
    public function index() {

        $categories = Category::latest()->get();

        return view('categories.index', compact('categories'));

    }

    public function show(Category $category) {

        return view('categories.show', compact('category'));

    }

    public function create() {

        return view('categories.create');

    }

    public function edit(Category $category) {

        return view('categories.edit', compact('category'));

    }

    public function store() {
        
        $category = new Category;
        $category->title = request('title');
        $category->save();
        $category->user_id = auth()->user()->id;

        return redirect('/categories');

    }

    public function update(Category $category) {
        
        $category->update(request()->only('title') );

        return redirect('/categories');

    }

    public function destroy(Category $category) {
        
        $category->delete();

        return redirect('/categories');

    }

    public function categoryArticles(Category $category) {

        $articles = Article::All();

        $currentArticlesIds = $category->articles()->pluck('articles.id')->toArray();

        return view('categories.articles', compact('category', 'currentArticlesIds', 'articles'));

    }

}
