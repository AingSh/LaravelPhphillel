@extends('layout')


@section('content')
    @forelse($users as $user)
        <ul>
            <li>{{ $user->id }}</li>
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
            <li>
                <a href="{{ route('user.posts', ['id' => $user->id]) }}">
                    Posts
                </a>
                @foreach($user->posts as $post)
                    <ul>
                        <li>{{ $post->id }}</li>
                        <li>{{ $post->title }}</li>
                        <li>
                            @foreach($post->tags as $tag)
                                <ul>
                                    <li>{{ $tag->id }}</li>
                                    <li>{{ $tag->title }}</li>
                                </ul>
                            @endforeach
                        </li>
                    </ul>
                @endforeach
            </li>
        </ul>
    @empty
        <p>Empty</p>
    @endforelse
@endsection()




