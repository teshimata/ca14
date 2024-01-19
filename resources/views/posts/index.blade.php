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
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{ $post->id }}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <a href='/categories/{{ $post->category->id }}'>{{ $post->category->name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action='/posts/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick='deletePost({{ $post->id }})'>削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
        <div>
            @foreach($questions as $question)
                <div>
                    <a href='https://teratail.com/questions/{{ $question['id'] }}'>
                        {{ $question['title'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </body>
    
</x-app-layout>{{ Auth::user() }}
</html>
