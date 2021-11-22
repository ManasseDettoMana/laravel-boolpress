@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div>
                <label for="title">Titolo</label>
                <input type="text" placeholder="Inserisci il titolo..." name="title">
            </div>
            <div>
                <label for="author">Autore</label>
                <input type="text" placeholder="Inserisci l'autore..." name="author">
            </div>
            <div>
                <label for="post_content">Contenuto</label>
                <input type="text" placeholder="Inizia a scrivere..." name="post_content">
            </div>
            <div>
                <label for="img_url">Immagine</label>
                <input type="text" placeholder="" name="img_url">
            </div>
            <input type="submit" value="Invia">
        </form>
    </div>
@endsection