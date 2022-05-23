<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
    * @param  \App\Http\Requests\StorePostRequest  $request
    * @return Illuminate\Http\Response
    */
 
    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        
        $post = Post::create([
            'post_title' => $request->input('title'),
            'post_body' => $request->input('body'),
            'website_id' => $request->input('website_id'),
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
