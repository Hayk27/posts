@extends('layouts.app')

@section('content')

<div class="container">
	<h1 class="blog-title">
		{{ $category->title }}
	</h1>
	<form method="post" action="/categories/{{ $category->id }}">
		{{ csrf_field() }}
    	{{ method_field('delete') }}
    	<button type="submit">DELETE</button>
	</form>
</div>

@endsection