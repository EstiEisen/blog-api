<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreUpdatePostRequest;
use App\Services\ExternalPostService;

class PostController extends Controller
{

    public function index()
    {
          $posts = Post::all();
          return view('posts.index', compact('posts'));
        
    }

    public function store(StoreUpdatePostRequest $request)
    {
        $validatedData = $request->validated();

        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'publication_date' => $validatedData['publication_date'],
        ]);

        return redirect()->route('posts.index')->with('success', 'post created successfully!');

    }
    public function update(StoreUpdatePostRequest $request, $id)
    {

      $post = Post::find($id);
      $post->update($request->all());
      return redirect()->route('posts.index')
        ->with('success', 'Post updated successfully.');
    }


    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('posts.index')
        ->with('success', 'post deleted successfully');
    }

    public function create()
    {
      return view('posts.create');
    }

    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
      $post = Post::find($id);
      return view('posts.edit', compact('post'));
    }

     public function getExternalPosts()
    {
        $posts = ExternalPostService::fetchPosts();
        return view('posts.externalPosts', compact('posts'));
    }
  
}
