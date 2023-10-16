@extends('layouts.app')


@section('titleOfPage')
Add post
@endsection


@section('content')
@php
$userId = session('user_id');
@endphp
@if($userId)
<div class="container mt-5">
    <div class="container py-5">
        <h1 class="text-center mb-4">Створення блогу</h1>
        <form action="/newPost" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Фото</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Назва блогу</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Опис</label>
                <textarea id="description" name="description" class="form-control textarea" rows="6"></textarea>
            </div>
            <div class="mb-3">
                <label for="categorySelect" class="form-label">Категорія</label>
                <select id="categorySelect" name="categorySelect" class="form-select">
                    <option value="">Виберіть категорію</option>
                    <option value="Технології">Технології</option>
                    <option value="Технології">Наука</option>
                    <option value="Спорт">Спорт</option>
                    <option value="Їжа">Їжа</option>
                    <option value="Подорожі">Подорожі</option>
                    <option value="Автомобілі">Автомобілі</option>
                    <option value="Мотоцикли">Мотоцикли</option>
                    <option value="Література">Література</option>
                    <option value="Природа">Природа</option>
                    <option value="Тварини">Тварини</option>
                    <option value="Волонтерство">Волонтерство</option>
                    <option value="Розваги">Розваги</option>
                    <option value="Фільми">Фільми</option>
                    <option value="Музика">Музика</option>
                    <option value="Дизайн">Дизайн</option>
                    <option value="Архітектура">Архітектура</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Створити блог</button>
            </div>
        </form>
    </div>
</div>
@else
<p>User ID not found in session.</p>
@endif
@endsection