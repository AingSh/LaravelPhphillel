@extends('layout')
@section('title','Update Page')


@section('content')
    <h1>{{$tag->title}}</h1>
    <ul>
        <li>
            Slug {{$tag->slug}}
        </li>
        <li>
            Create {{$tag->created_at}}
        </li>
        <li>
            Updated {{$tag->updated_at}}
        </li>
    </ul>
    <a href="{{route('admin.tag')}}" class="btn btn-info">Назад</a>
@endsection

