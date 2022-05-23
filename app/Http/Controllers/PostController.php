<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Cache;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Cache::get('posts');
        //$posts = Post::all();
        return $posts;
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

        Cache::put('posts', Post::all());

        
        $subscribers = Cache::get('subscribers')->where('website_id' , $post->website_id)->collect();
 
        if(count($subscribers) > 0){
            foreach($subscribers as $sub){
                //Idea is to set a flag in subscriber table with the last emailed post id to prevent duplicacy. 
                // This can be improved by using a cached table, but that seemed out of the scope for the moement.
                if($sub->prev_notified_post_id != $post->website_id){

                    $details['email'] = $sub->user->email;
                    $details['title'] = $post->post_title;
                    $details['body'] = $post->post_body;
                    
                    dispatch(new App\Jobs\SendEmailJob($details));
                    

                    //Updating the flag once the mail is dispatched for the particular post
                    $sub->prev_notified_post_id =   $post->id;
                    $sub->save();
                }
            }
        }   
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
