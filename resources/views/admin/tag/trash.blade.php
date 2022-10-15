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
        @forelse($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>
                    <a href="{{ route('admin.tag.restore', ['id' => $tag->id])}}" class="btn btn-info">Возродить</a>
                    <a href="{{ route('admin.tag.forceDelete', ['id' => $tag->id])}}" class="btn btn-danger">Удалить на всегда</a>
                </td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>
    </table>
    <a href="{{route('admin.tag.trash')}}" class="btn btn-info">Назад</a>
@endsection




