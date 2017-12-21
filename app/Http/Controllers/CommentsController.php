<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Article $article) {
    	
    	$article->addComment([
    		'body' => request('body'), 
    		'user_id' => auth()->user()->id
    	]);

    	return back();

    }
}
