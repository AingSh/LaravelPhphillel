@extends('layout')
@section('title','Update Page')


@section('content')
    <form action="/category/update" method="POST">
        <input type="hidden" value="{{ $category->id }}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
        </div>

        <button type="submit" class="btn btn-primary">Обновляем Категорию</button>
    </form>
@endsection