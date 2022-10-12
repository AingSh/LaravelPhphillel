@extends('layout')


@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Post Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Body post</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td># {{$post->user_id}}</td>
                <td># {{$post->category_id}}</td>
                <td>no tags</td>
                <td>{{$post->body}}</td>
                <td>{{$post->updated_at}}</td>
            </tr>
        @empty
            <p>Ничего нет</p>
            @endforelse
        </tbody>
    </table>
@endsection


