<?php

namespace App\Http\Controllers\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('timeline.index')
            ->with('posts', $posts);
    }
}
