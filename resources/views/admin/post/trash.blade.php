@extends('layout')



@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Управление</th>

        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>
                    <a href="{{ route('admin.post.restore', ['id' => $post->id])}}" class="btn btn-info">Возродить</a>
                    <a href="{{ route('admin.post.forceDelete', ['id' => $post->id])}}" class="btn btn-danger">Удалить на всегда</a>
                </td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
    <a href="{{route('admin.post')}}" class="btn btn-info">Назад</a>
@endsection




