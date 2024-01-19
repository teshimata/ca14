<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <x-slot name='header'>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
       
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        <h1>Blog Name</h1>
        <form action='/posts/{{ $post->id }}' method='POST'>
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>Title</h2>
                <input type='text' name=post[title] placeholder='タイトル' value='{{ $post->title }}'/>
                <p class='title__error' style='color:red'>{{ $errors->first('post.title') }}</p>
            </div>
            <div class='content__body'>
                <h2>Body</h2>
                <textarea name='post[body]' placeholder='本文'>{{ $post->body }}</textarea>
                <p class='boby__error' style='color:red'>{{ $errors->first('post.body') }}</p>
            </div>
            <input type='submit' value='更新'>
        </form>
        <div class='footer'>
        <a href='/posts/{{ $post->id }}'>戻る</a>
        </div>
    </body>
</x-app-layout>
</html>
