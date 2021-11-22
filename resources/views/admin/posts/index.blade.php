@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('delete'))
            <div class="alert alert-success" role="alert">
                {{session('delete') }} è stato eliminato con successo!
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Posts</th>      
                    <th><a href="{{route('admin.posts.create')}}" >Aggiungi un nuovo post</a></th>      
                </tr>
            </thead>
            <tbody>
                
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <div class="">
                                <h2><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></h2>
                                <h4>{{$post->author}}</h4>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}" >Edit Post</a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.posts.destroy', $post)}}" class="delete-form" data-post-id="{{$post->id}}" data-post-title="{{$post->title}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts-section')
    
<script>
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
</script>
@endsection