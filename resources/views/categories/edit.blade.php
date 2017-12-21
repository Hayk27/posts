@extends('layouts.app')
@section('content')
<form method="POST" action="/categories/{{ $category->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection