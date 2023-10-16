@extends('layouts.app')


@section('titleOfPage')
Authorization
@endsection


@section('content')
<h1 class="mt-5 text-center">Welcome</h1>
<form class="container mt-5" action="/auth" method="post">
    @csrf
    <h1 class="h3 mb-3 fw-normal mt-3">Please sign in</h1>

    <div class="form-floating">
        <input type="text" class="form-control" id="login" name="login" placeholder="Your login">
        <label for="login">Login</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <a class="btn btn-link mt-3" href="/registration" role="button">Don't have an account? Sign up</a>
    <p class="mt-3 mb-3 text-body-secondary">© 2017–2023</p>
</form>
@endsection