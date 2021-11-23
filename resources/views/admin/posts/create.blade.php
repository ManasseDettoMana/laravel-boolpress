@extends('layouts.app')

@section('content')
    <div class="container">
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
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" placeholder="Inserisci il titolo..." name="title">
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id">
                    <option value="">Nessuna Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" placeholder="Inserisci l'autore..." name="author">
            </div>
            
            <div class="form-group">
                <label for="post_content">Contenuto</label>
                <input type="text" placeholder="Inizia a scrivere..." name="post_content">
            </div>
            <div class="form-group">
                <label for="img_url">Immagine</label>
                <input type="text" placeholder="" name="img_url">
            </div>
            <input type="submit" value="Invia">
        </form>
    </div>
@endsection