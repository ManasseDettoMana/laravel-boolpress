<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:30',
            // 'user_id' => 'required|string|max:30',
            'post_content' => 'required|string',
            'category_id' => 'nullable',
        ],
        [
            'required' => 'Devi compilare correttamente :attribute',
            'title.required' => 'Non è possibile inserire un post senza titolo',
            // 'user_id.max' => 'Non è possibile inserire un autore con più di 30 caratteri',
        ]);


        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $post = new Post();
        
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->save();


        // QUESTA OPERAZIONE SI FA DOPO IL SAVE PERCHÈ ALTRIMENTI PRIMA NON ESISTEREBBE ALCUN POST DA CUI PRENDERE QUESTI TAGS.
        //se esiste una chiave 'tags' nell'array data, allora attacca tutti i tag selezionati al post con il metodo sync
        if(array_key_exists('tags', $data))
        {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('delete', $post->title);
    }
}
