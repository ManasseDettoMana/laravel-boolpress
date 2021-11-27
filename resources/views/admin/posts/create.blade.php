@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- ERRORI COMPILAZIONE DEI FORM  --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            {{-- TITOLO  --}}
            <div class="form-group">
                {{-- <label for="title">Titolo</label> --}}
                <legend>Titolo</legend>
                <input type="text" placeholder="Inserisci il titolo..." name="title" value="{{old('title', $post->title)}}">
            </div>
            {{-- CATEGORIA  --}}
            <div class="form-group">
                {{-- <label for="category_id">Categoria</label> --}}
                <legend>Categoria</legend>
                <select name="category_id" id="category_id">
                    <option value="">Nessuna Categoria</option>
                    @foreach ($categories as $category)
                        <option 
                            @if (old('category_id') == $category->id) selected @endif
                            value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            {{-- TAG  --}}
            <div class="mt-2 mb-2">
                <legend>Tags</legend>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]">
                        <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>
            {{-- CONTENUTO  --}}
            <div class="form-group">
                <legend for="post_content">Contenuto</legend>
                <input type="text" placeholder="Inizia a scrivere..." name="post_content" value="{{old('post_content', $post->post_content)}}">
            </div>
            {{-- IMMAGINE  --}}
            <div class="form-group">
                <legend for="img_url">Url immagine</legend>
                <input type="text" placeholder="" name="img_url" value="{{old('img_url', $post->img_url)}}">
            </div>
            <input type="submit" value="Invia">
        </form>
    </div>
@endsection