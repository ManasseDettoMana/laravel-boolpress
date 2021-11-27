@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('admin.posts.index')}}">Home</a>

        <form action="{{route('admin.posts.update', $post)}}" method="POST">
            @method('PUT')
            @csrf


            <div>
                {{-- <label for="title">Titolo</label> --}}
                <legend>Titolo</legend>
                <input type="text" value="{{$post->title}}" name="title">
            </div>
            <div class="form-group">
                <legend >Categoria</legend>
                <select name="category_id" id="category_id">
                    <option value="">@if($post->category) {{$post->category->name}} @else Nessuna Categoria @endif</option>
                    @foreach ($categories as $category)
                        <option 
                            @if (old('category_id') == $category->id) selected @endif
                            value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2 mb-2 form-group">
                <legend>Tags</legend>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" 
                            @if(in_array($tag->id, old('tags', $tag_ids ? $tag_ids : []))) checked  @endif>
                        <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>
            <div>
                <legend for="user_id">Autore: {{$post->user->name}}</legend>
            </div>
            <div>
                <legend>Contenuto</legend>
                <input type="text" value="{{$post->post_content}}" name="post_content">
            </div>
            <div>
                <legend >Immagine</legend>
                <input type="text" value="{{$post->img_url}}" name="img_url">
            </div>
            <input type="submit" value="Invia">
            <a href="{{route('admin.posts.show', $post->id)}}">Annulla</a>

        </form>
    </div>
@endsection