@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 d-flex align-item-center justify-content-center">
                <div class="card mt-5 mb-5 w-50">
                    <div class="card-body">
                        <h5 class="card-title  text-center text-uppercase">Login</h5>
                        <hr>
                        <form action="" method="post">
                            @csrf

                            @if($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endisset
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">login</button>
{{--                            <a href="" class="btn btn-success">New account</a>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
