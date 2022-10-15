@extends('layout')


@section('content')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Добавить категорию</a>
    <a href="{{ route('admin.category.trash') }}" class="btn btn-danger">Корзина</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>
                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                       class="btn btn-primary">Редактировать</a>
                    <a href="{{ route('admin.category.destroy', ['id' => $category->id]) }}" class="btn btn-danger">
                        Удалить</a>
                    <a href="{{ route('admin.category.show', ['id' => $category->id]) }}" class="btn btn-info">Показать</a>
                </td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ $categories->previousPageUrl() }}" class="btn btn-secondary " tabindex="-1" role="button"
           aria-disabled="true">Назад</a>
        <a href="{{ $categories->nextPageUrl() }}" class="btn btn-primary " tabindex="-1" role="button"
           aria-disabled="true">Далее</a>
    </div>

@endsection


