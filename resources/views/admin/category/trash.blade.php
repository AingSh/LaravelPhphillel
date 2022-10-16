@extends('layout')



@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">slug</th>
            <th scope="col">Управление</th>

        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>
                    <a href="{{ route('admin.category.restore', ['id' => $category->id])}}" class="btn btn-info">Возродить</a>
                    <a href="{{ route('admin.category.forceDelete', ['id' => $category->id])}}" class="btn btn-danger">Удалить на всегда</a>
                </td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
    <a href="{{route('admin.category')}}" class="btn btn-info">Назад</a>
@endsection




