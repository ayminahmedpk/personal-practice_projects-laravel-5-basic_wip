<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;


class PostsController extends Controller {

    public function __construct()
    {
        $this->middleware( 'auth', ['except' => ['index', 'show']] );
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Post::all();
        // $posts = Post::all();
        // return Post::where('title', 'Post 2')->get();
        // $posts = Post::orderBy('created_at', 'desc')->take(1)->get();


        // To implement pagination
        // $posts = Post::orderBy('created_at', 'desc')->paginate(1);
        
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);

        $post = new Post;
        
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
        // return 'Post with id ' . $id;
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

        // If logged in and directely browsed to link /post/{id}/edit, could
        // edit another user's post. This if block restricts it.
        if(auth()->user->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Access denied');
        }

        return view('posts.edit')->with('post', $post);
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
        //

        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body  = $request->input('body');

        $post->save();

        $data = array(
            'post'    => $post,
            'success' => 'Post edited'
        );

        // return redirect('/posts')->with('success', 'post updated');
        return redirect()->route('posts.show', ['id' => $id])->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // If logged in and directely browsed to link /post/{id}/delete, could
        // delete another user's post. This if block restricts it.
        if(auth()->user->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Access denied');
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted');
    }
}
