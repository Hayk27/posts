<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    
    public function index() {

        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));

    }

    public function show(Article $article) {

    	$categories = Category::all();

    	$currentCategoriesIds = $article->categories()->pluck('categories.id')->toArray();

        return view('articles.show', compact('article', 'currentCategoriesIds', 'categories'));

    }

    public function create() {

    	$categories = Category::all();

        return view('articles.create', compact('categories'));

    }

    public function edit(Article $article) {

    	$categories = Category::all();

    	$currentCategoriesIds = $article->categories()->pluck('categories.id')->toArray();

        return view('articles.edit', compact('article', 'categories', 'currentCategoriesIds'));

    }

    public function store() {
        
        $article = new Article;
        $article->title = request('title');
        $article->body = request('body');
        $article->user_id = auth()->user()->id;
        $article->save();

        $article->categories()->attach(request()->categories);

        return redirect('/articles');

    }

    public function update(Article $article) {
        
        $article->update(request()->only(['title','body']) );

        $article->categories()->sync(request()->categories);

        return redirect('/articles');

    }

    public function destroy(Article $article) {
        
        $article->delete();

        return redirect('/articles');

    }

}
