@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('delete'))
            <div class="alert alert-success" role="alert">
                {{session('delete') }} è stato eliminato con successo!
            </div>
        @endif
        <h1>Posts</h1>
        <a href="{{route('admin.posts.create')}}" >Aggiungi un nuovo post</a>
        <table>
            <thead>
                <tr>
                    <th class="col-4">Titolo</th>         
                    <th class="col-2">Categoria</th>   
                    <th class="col-2">Tags</th>   
                    <th class="col-2">Autore</th>   
                </tr>
            </thead>
            <tbody>
                
                @foreach ($posts as $post)
                    <tr>
                        <td class="col-4"><h2><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></h2></td>
                        <td class="col-2"><address>@if($post->category) {{$post->category->name}} @else N.C. @endif</address></td>
                        <td class="col-2">
                            @forelse ($post->tags as $tag)
                                <span class="badge badge-pill p-2" style="background-color: {{$tag->color}};">{{$tag->name}}</span>
                            @empty
                                <span class="badge badge-pill">-</span>
                            @endforelse
                        </td>
                        <td class="col-2"><h6>{{$post->user->name}}</h6></td>
                        <td class="col-4">
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="mr-3" >Edit Post</a>
                            <form method="POST" action="{{route('admin.posts.destroy', $post)}}" class="delete-form" data-post-id="{{$post->id}}" data-post-title="{{$post->title}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" onclick="return confirm('Sei sicura/o di voler eliminare questo post?');">
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
        <footer>
            <div class="mt-5">
                {{$posts->links()}}
            </div>
        </footer>
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