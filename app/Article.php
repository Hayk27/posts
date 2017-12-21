<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body'];

    public function categories() {

        return $this->belongsToMany('App\Category', 'category_article');

    }

    public function comments() {

    	return $this->hasMany(Comment::class);

    }
    public function addComment($params) {

    	$this->comments()->create($params);
        
    }
}
