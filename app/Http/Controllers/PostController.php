<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreUpdatePostRequest;
use App\Services\ExternalPostService;

class PostController extends Controller
{

     //Display a listing of the posts.
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

     //Store a newly created post in the database.
    public function store(StoreUpdatePostRequest $request)
    {
        $validatedData = $request->validated();

        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'publication_date' => $validatedData['publication_date'],
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

   
     // Update the specified post in the database.
    public function update(StoreUpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

   
     //Remove the specified post from the database.
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    
     //Show the form for creating a new post.
    public function create()
    {
        return view('posts.create');
    }

    
     //Display the specified post.
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    
     // Show the form for editing the specified post.
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

     // Fetch external posts from an external service.
    public function getExternalPosts()
    {
        $posts = ExternalPostService::fetchPosts();
        return view('posts.externalPosts', compact('posts'));
    }
}