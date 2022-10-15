@extends('layout')


@section('content')
    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">Добавить Тег</a>
    <a href="{{ route('admin.tag.trash') }}" class="btn btn-danger">Корзина</a>

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
        @forelse($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>
                    <a href="{{ route('admin.tag.edit', ['id' => $tag->id]) }}"
                       class="btn btn-primary">Редактировать</a>
                    <a href="{{ route('admin.tag.destroy', ['id' => $tag->id]) }}" class="btn btn-danger">
                        Удалить</a>
                    <a href="{{ route('admin.tag.show', ['id' => $tag->id]) }}" class="btn btn-info">Показать</a>

                </td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ $tags->previousPageUrl() }}" class="btn btn-secondary " tabindex="-1" role="button"
           aria-disabled="true">Назад</a>
        <a href="{{ $tags->nextPageUrl() }}" class="btn btn-primary " tabindex="-1" role="button"
           aria-disabled="true">Далее</a>
    </div>

@endsection


