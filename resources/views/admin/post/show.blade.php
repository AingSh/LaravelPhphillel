@extends('layout')
@section('title','Update Page')


@section('content')
    <h1>{{$post->title}}</h1>
    <ul>
        <li>
            Slug {{$post->slug}}
        </li>
        <li>
            Body {{$post->body}}
        </li>
        <li>
            ID category {{$post->category_id}}
        </li>
        <li>
            ID usera {{$post->user_id}}
        </li>
        <li>
            Create {{$post->created_at}}
        </li>
        <li>
            Updated {{$post->updated_at}}
        </li>
    </ul>
    <a href="{{route('admin.post')}}" class="btn btn-info">Назад</a>
@endsection

