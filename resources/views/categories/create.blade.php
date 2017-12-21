@extends('layouts.app')
@section('content')
<form method="POST" action="/categories">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection