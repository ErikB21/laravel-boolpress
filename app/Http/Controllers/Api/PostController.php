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
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->firstOrFail();//recupero il post con lo slug uguale a quello richiesto nella url

        if($post->cover){
            $post->cover = asset('storage/' . $post->cover);
        }else{
            $post->cover = asset('images/tree.png');
        }

        return response()->json([//mi riporti quel post
            'success' => true,
            'result' => $post
        ]);
    }

    //possiamo creare l'istanza con firstOrFail(), che cattura l'errore da se
    //quindi il nostro if ed else non servirebbero. Nel componente del dettaglio 
    //del post, oltre alla then, passare anche la catch, che ci ritornerà l'errore in console.
    

}