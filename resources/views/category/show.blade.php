@extends('layout')
@section('title','Update Page')


@section('content')
    <h1>{{$category->title}}</h1>
    <ul>
        <li>
            Slug {{$category->slug}}
            Create {{$category->created_at}}
            Updated {{$category->updated_at}}
        </li>
    </ul>
@endsection