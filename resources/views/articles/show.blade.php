@extends('layouts.app')

@section('content')

<div class="container">
	<h1 class="blog-title">
		{{ $article->title }}
	</h1>
	<p class="description">
		{{ $article->body }}
	</p>
	<form method="post" action="/articles/{{ $article->id }}">
		{{ csrf_field() }}
    	{{ method_field('delete') }}
    	<button type="submit">DELETE</button>
	</form>
	<div>
		<h3>Categories</h3>
		@foreach ($categories as $category)
			<p>{{ in_array($category->id, $currentCategoriesIds) ? $category->title : "" }}</p>
		@endforeach	
	</div>
	@foreach ($article->comments as $comment)
		<strong>
			{{ $comment->created_at->diffForHumans() }}
		</strong>
		<article>
			{{ $comment->body }}
		</article>
	@endforeach	
	<form method="POST" action="/articles/{{ $article->id }}/comments">
		{{ csrf_field() }}
		<div class="form-group">
			<textarea name="body" placeholder="your comment here" class="form-control"></textarea>
		</div>
		<div class="form-group">	 
	    	<button type="submit" class="btn btn-primary">Add comment</button>
		</div>
	</form>

</div>

@endsection