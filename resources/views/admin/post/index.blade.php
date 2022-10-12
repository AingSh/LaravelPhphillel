@extends('layout')


@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td># {{$post->user_id}}</td>
                <td># {{$post->category_id}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>

                </td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ $posts->previousPageUrl() }}" class="btn btn-secondary " tabindex="-1" role="button"
           aria-disabled="true">Назад</a>
        <a href="{{ $posts->nextPageUrl() }}" class="btn btn-primary " tabindex="-1" role="button"
           aria-disabled="true">Далее</a>
    </div>
@endsection


