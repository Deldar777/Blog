<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    public function index()
    {
        return view('blog.index')
            ->with('posts', Post::all());
    }


    public function create()
    {
        return view('blog.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        //Create a slug for the name
        $slug =  SlugService::createSlug(Post::class, 'slug', $request->title);

        // Create a unique id for the image
        $imagePath= uniqid() . '-' . $slug . '.' . $request->image->extension();

        // Store the image to the public folder
        $request->image->move(public_path('images'), $imagePath);


        Post::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'image_path' => $imagePath,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/blog')->with('message', 'Your post has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'user_id' => auth()->user()->id,
            ]);

        return redirect('/blog')
            ->with('message', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug' , $slug);
        $post->delete();


        return redirect('/blog')
            ->with('message', 'Your post has been deleted');

    }
}
