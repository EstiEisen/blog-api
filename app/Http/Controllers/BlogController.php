<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\StoreUpdateBlogRequest;

class BlogController extends Controller
{

    public function index()
    {
          $blogs = Blog::all();
          return view('blogs.index', compact('blogs'));
        
    }

    public function store(StoreUpdateBlogRequest $request)
    {
        $validatedData = $request->validated();

        Blog::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'publication_date' => $validatedData['publication_date'],
        ]);

        return redirect()->route('blogs.index')->with('success', 'blog created successfully!');

    }
    public function update(StoreUpdateBlogRequest $request, $id)
    {

      $blog = Blog::find($id);
      $blog->update($request->all());
      return redirect()->route('blogs.index')
        ->with('success', 'Blog updated successfully.');
    }


    public function destroy($id)
    {
      $blog = Blog::find($id);
      $blog->delete();
      return redirect()->route('blogs.index')
        ->with('success', 'Blog deleted successfully');
    }

    public function create()
    {
      return view('blogs.create');
    }

    public function show($id)
    {
      $blog = Blog::find($id);
      return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
      $blog = Blog::find($id);
      return view('blogs.edit', compact('blog'));
    }
  
}
