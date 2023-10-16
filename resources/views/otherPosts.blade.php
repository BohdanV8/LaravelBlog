@extends('layouts.app')


@section('titleOfPage')
Other posts
@endsection


@section('content')
<h1 class="mt-5 text-center">Other posts</h1> @foreach($posts as $post) @php
    $user=\App\Models\newUser::find($post->user_id); @endphp <div class="text-center">
    <h1>{{ $user->name }}</h1>
        <h1>{{ $post->title }}</h1>
        <img src="{{ asset($post->image) }}" alt="img" class="img-fluid max-width-100" />
        <h2>{{ $post->description }}</h2>
            </div>
            @endforeach
            @endsection