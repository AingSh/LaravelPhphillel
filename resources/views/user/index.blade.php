@extends('layout')


@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <a href="{{ route('user.posts', ['id' => $user->id]) }}">
                        Posts
                    </a></td>
            </tr>
        @empty
            <p>Ничего нет</p>
        @endforelse
        </tbody>

    </table>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ $users->previousPageUrl() }}" class="btn btn-secondary " tabindex="-1" role="button"
           aria-disabled="true">Назад</a>
        <a href="{{ $users->nextPageUrl() }}" class="btn btn-primary " tabindex="-1" role="button"
           aria-disabled="true">Далее</a>
    </div>
@endsection




