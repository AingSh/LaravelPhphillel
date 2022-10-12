@extends('layout')


@section('content')
    <h1>Все посты этого автора одной категории </h1>
    <h2>#Категории {{$category_id}} </h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#Поста</th>
            <th scope="col">Титл Поста</th>
            <th scope="col">Тест</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>

    </table>
@endsection
