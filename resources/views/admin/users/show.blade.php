@extends('layouts.app')

@section('content')
    <a href="{{route('admin.users.index')}}">Torna alla lista utenti</a>
    <div class="card">
        <h4>{{$user->id}}</h4>
        <h2>{{$user->name}}</h2>

        <address>{{$user->email}}</address>
        
    </div>
    <div>
        <a href="{{route('admin.users.edit', $user->id)}}">Edit</a>
    </div>
@endsection