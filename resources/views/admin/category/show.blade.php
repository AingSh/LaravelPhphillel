@extends('layout')
@section('title','Update Page')


@section('content')
    <h1>{{$category->title}}</h1>
    <ul>
        <li>
            Slug {{$category->slug}}
        </li>
        <li>
            Create {{$category->created_at}}
        </li>
        <li>
            Updated {{$category->updated_at}}
        </li>
    </ul>
    <a href="{{route('admin.category')}}" class="btn btn-info">Назад</a>
@endsection

