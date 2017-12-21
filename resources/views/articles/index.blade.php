@extends('layouts.app')

@section('content')

<div class="container">
	@foreach ($articles as $article)
		<div class="card-body">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text">{{ $article->body }}</p>
            <a href="{{ url('/articles/' . $article->id) }}" class="btn btn-primary">Read More &rarr;</a>
        </div>
	@endforeach
</div>

@endsection