@extends('layout')


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Post Title</th>
            <th scope="col">Author Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Tags #</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td># {{$post->user_id}}</td>
                <td># {{$post->category_id}}</td>
                <td>no tags</td>
            </tr>
        @empty
            <p>Ничего нет</p>
            @endforelse
        </tbody>
    </table>
@endsection


