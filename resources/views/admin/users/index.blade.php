@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('delete'))
            <div class="alert alert-success" role="alert">
                {{session('delete') }} è stato eliminato con successo!
            </div>
        @endif
        <header>
            <h1>Utenti registrati</h1>
            <a href="{{route('admin.users.create')}}" >Aggiungi un nuovo utente</a>
        </header>
        <table>
            <thead>
                <tr>
                    <th class="col-1">ID</th>         
                    <th class="col-3">Nome</th>   
                    <th class="col-4">Indirizzo Email</th>   
                    <th class="col-2">Ruoli</th>   
                    <th class="col-1"></th>   
                    <th class="col-1"></th>   
                </tr>
            </thead>
            <tbody>
                
                @foreach ($users as $user)
                    <tr>
                        <td class=""><h2><a href="{{route('admin.users.show', $user->id)}}">{{$user->id}}</a></h2></td>
                        <td class=""><h6><a href="{{route('admin.users.show', $user->id)}}">{{$user->name}}</a></h6></td>
                        <td class=""><h6>{{$user->email}}</h6></td>
                        <td></td>
                        <td class="">
                            <a href="{{route('admin.users.edit', $user->id)}}" class="mr-3" >Edit User</a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.users.destroy', $user)}}" class="delete-form" data-user-id="{{$user->id}}" data-user-title="{{$user->title}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" onclick="return confirm('Sei sicura/o di voler eliminare questo utente?');">
                            </form> 
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts-section')
    
{{-- <script>
        console.log('askdbadgbaskd');
        const deleteFormElements = document.querySelectorAll('.delete-form');
        deleteFormElements.forEach(form =>{
            form.addEventListener('submit', function(event){
                event.preventDefault();
                const id = form.getAttribute('data-post-id');
                const title = form.getAttribute('data-post-title');
                const confirm = window.confirm(`Sei sicura/o di voler eliminare  ${title} dalla lista?`);
                if(confirm)
                {
                    this.submit();
                }
            });
        });
    </script> --}}
@endsection