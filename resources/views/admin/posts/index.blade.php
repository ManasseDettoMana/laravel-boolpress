@extends('layouts.app')

@section('content')
    <div class="container">
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
                            <a href="{{route('admin.posts.edit', $post->id)}}" >Edit</a>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>




        {{-- @foreach ($posts as $post)
            <div class="card">
                <h2>{{$post->title}}</h2>
                <h4>{{$post->author}}</h4>
                <p>{{$post->post_content}}</p> 
                <select name="category_id" id="category_id">
                    <option value="">nessuna categoria</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    
                </select> 
                <a href="{{asset('admin/posts/show')}}">Mostra</a>
            </div>
        @endforeach --}}
    </div>
@endsection