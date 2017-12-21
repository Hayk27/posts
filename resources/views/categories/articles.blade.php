@extends('layouts.app')

@section('content')

<div class="container">
	<h1>{{ $category->title }} articles</h1>
	@foreach ($articles as $article)
		<p>{{ in_array($article->id, $currentArticlesIds) ? $article->title : "" }}</p>
	@endforeach	
</div>	

@endsection