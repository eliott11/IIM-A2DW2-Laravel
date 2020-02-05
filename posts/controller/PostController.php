<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {


    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::all();

        return view( 'posts.index', [ 'posts' => $posts ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'posts.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $validatedPost = $this->validatePost( $request );
        $post          = new Post( $validatedPost );
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route( 'posts.show', $post );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Post $post ) {
        return view( 'posts.show', [ 'post' => $post ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Post $post ) {
        return view( 'posts.edit', [ 'post' => $post ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Post $post ) {
        $validatedPost = $this->validatePost( $request );
        $post->fill( $validatedPost );
        $post->save();

        return redirect()->route( 'posts.show', $post );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Post $post ) {
        $post->delete();

        return redirect()->route('posts.index');
    }


    /**
     * @param Request $request
     */
    private function validatePost( Request $request ) {
        return $request->validate( [
            'title'   => 'required|max:255',
            'content' => 'required'
        ] );
    }
}
