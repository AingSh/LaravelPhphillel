@extends('layout')
@section('title','Update Page')


@section('content')
    <h1>Post {{$id}}</h1>
    <form action="{{route('admin.post.update' , ['id' => $post->id])}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" class="form-control" id="body" name="body" value="{{ $post->body }}">
            @if($errors->has('body'))
                @foreach($errors->get('body') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option @if($category->id == $post->category_id) selected @endif value="{{$category->id}}">
                        {{$category->title}} | slug - {{$category->slug}} </option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                @foreach($errors->get('category_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option @if($user->id == $post->user_id) selected @endif value="{{$user->id}}">
                        {{$user->name}}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has('user_id'))
            @foreach($errors->get('user_id') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endisset
        <div class="mb-3">
            <label for="tags_id" class="form-label">Tags</label>
            <select name="tags_id[]" id="tags_id" multiple>
                @foreach($tags as $tag)
                    <option @if(in_array($tag->id,$post->tags->pluck('id')->toArray())) selected
                            @endif value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has('tags_id'))
            @foreach($errors->get('tags_id') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endisset
        <button type="submit" class="btn btn-primary">Обновить пост</button>
    </form>
@endsection
