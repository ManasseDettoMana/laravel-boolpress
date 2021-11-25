@extends('layouts.app')

@section('content')
    <a href="{{route('admin.posts.index')}}">Torna ai post</a>
    <div class="card">
        <picture>
            <img src="{{$post->img_url}}" alt="">
        </picture>
        <h2>{{$post->title}}</h2>
        <h4>{{$post->user_id}}</h4>
        <p>{{$post->post_content}}</p>
        <address>Categoria: @if($post->category){{$post->category->name}} @else N.C. @endif</address>
    </div>
    <div>
        <a href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
    </div>
@endsection