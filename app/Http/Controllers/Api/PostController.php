<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
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
        $posts = Post::with(['category', 'tags'])->paginate(3);
        
        foreach($posts as $post){
            if($post->cover){
                $post->cover = asset('storage/' . $post->cover);
            }else{
                $post->cover = asset('images/tree.png');
            }
        }
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

}