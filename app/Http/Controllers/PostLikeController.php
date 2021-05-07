<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post, Request $request){
      //  dd($id);

     // dd($post->likedBy($request->user()));

     if($post->likedBy($request->user()))
     {
         return response(null, 409);
     }
        $post->likes()->create([
                'user_id'=>$request->user()->id,
        ]);

        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){

        
            Mail::to($post->user)->send(new PostLiked(auth()->user(),$post));

        }
        return back();
    }

    public function destroy(Post $post, Request $request){
        //dd($post);

        $request->user()->likes()->where('post_id',$post->id)->delete();
            return back();
    }
}
