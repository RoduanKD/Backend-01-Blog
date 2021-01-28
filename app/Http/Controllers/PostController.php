<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', ['categories' => $categories, 'tags' => $tags]);
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
            'title'             => 'required|string|min:4|max:255',
            'content'           => 'required|string|min:15',
            'slug'              => 'required|alpha_dash|min:4|max:255|unique:posts',
            'featured_image'    => 'required|active_url',
            'category_id'       => 'required|exists:categories,id',
            'tags'              => 'required|array'
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->featured_image = $request->featured_image;
        
        if($post->save()) {
            $post->tags()->attach($request->tags);
            request()->session()->flash('success', 'Post was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('slug', $id)->firstOrFail();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'             => 'required|string|min:4|max:255',
            'content'           => 'required|string|min:15',
            'slug'              => 'required|alpha_dash|min:4|max:255|unique:posts,slug,'.$id,
            'featured_image'    => 'required|active_url',
            'category_id'       => 'required|exists:categories,id',
            'tags'              => 'required|array|min:1'
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $request->slug;
        $post->featured_image = $request->featured_image;
        $post->category_id = $request->category_id;
        $post->tags()->sync($request->tags);
        
        if($post->save()) {
            request()->session()->flash('success', 'Post was updated successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::destroy($id);
        // TODO remove all relations before deleting

        request()->session()->flash('danger', 'Post was Deleted successfully.');

        return redirect()->route('posts.index');
    }
}
