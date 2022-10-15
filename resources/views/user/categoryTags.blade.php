@extends('layout')


@section('content')
    <h1>{{ $tag->title }}</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Category</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>{{$post->category_id}}</td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
@endsection
