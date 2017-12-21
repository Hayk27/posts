@extends('layouts.app')
@section('content')
<form method="POST" action="/articles/{{ $article->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" class="form-control">{{ $article->body }}</textarea>
    </div>
    <select class="js-example-basic-multiple" name="categories[]" multiple="multiple">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ in_array($category->id, $currentCategoriesIds) ? "selected" : "" }}>{{ $category->title }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection