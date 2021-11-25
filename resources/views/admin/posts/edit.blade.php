@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('admin.posts.index')}}">Home</a>

        <form action="{{route('admin.posts.update', $post)}}" method="POST">
            @method('PUT')
            @csrf


            <div>
                <label for="title">Titolo</label>
                <input type="text" value="{{$post->title}}" name="title">
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id">
                    <option value="">@if($post->category) {{$post->category->name}} @else Nessuna Categoria @endif</option>
                    @foreach ($categories as $category)
                        <option 
                            @if (old('category_id') == $category->id) selected @endif
                            value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="user_id">Autore</label>
                <input type="text" value="{{$post->user_id}}" name="user_id">
            </div>
            <div>
                <label for="post_content">Contenuto</label>
                <input type="text" value="{{$post->post_content}}" name="post_content">
            </div>
            <div>
                <label for="img_url">Immagine</label>
                <input type="text" value="{{$post->img_url}}" name="img_url">
            </div>
            <input type="submit" value="Invia">
            <a href="{{route('admin.posts.show', $post->id)}}">Annulla</a>

        </form>
    </div>
@endsection