@extends('layout')


@section('content')
    <div>
        <h1>ID - {{ $page->id }}</h1>
        <h2> TITLE - {{ $page->title }}
            <h2>
                <h3>DESCR - {{ $page->description }}<h3>
    </div>
    <a href="{{ route('page') }}">
        Back
    </a>
    <div>
        <p>Comments</p>
        @foreach($page->comments as $comment)
            <ul>
                <li> {{$comment->body}}</li>
            </ul>
        @endforeach

    </div>

    <section>
        <div class="container my-5 py-5 text-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar"
                                     width="65"
                                     height="65"/>
                                <div class="w-100">
                                    <form action="{{ route('page.add.comment', ['id' => $page->id]) }}" method="post">
                                        @csrf
                                        <div class="form-outline">
                                            <label for="body" class="form-label">Add a comment</label>
                                            <input type="text" class="form-control" id="body" name="body">
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="submit" class="btn btn-success">Send</button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection()


