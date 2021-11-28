@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-between">
    {{-- <div class="row justify-content-center" id="status_row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                
                <button class="btn" id="close_button">chiudi</button>
            </div>
        </div>
    </div> --}}
    <a href="{{route('admin.posts.index')}}">Tutti i post</a>
    <a href="{{route('admin.users.index')}}">Tutti gli utenti</a>
</div>


@endsection
