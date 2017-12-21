@extends('layouts.app')

@section('content')

<div class="container">
	@foreach ($categories as $category)
		<div class="card-body">
            <h2 class="card-title">{{ $category->title }}</h2>
            <a href="{{ url('/categories/' . $category->id) }}" class="btn btn-primary">Read More</a>
        </div>
	@endforeach
</div>

@endsection