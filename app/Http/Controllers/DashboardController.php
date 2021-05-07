<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
    //    dd(auth()->user());
    //dd(auth()->user()->posts);
      //   dd(Post::find(3)->created_at);
    
    return view('dashboard');
    }
}
