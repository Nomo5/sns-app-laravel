<?php

namespace App\Http\Controllers\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Timeline\CreateRequest;
use App\Models\Post;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        //
        $post = new Post;
        $post->content = $request->content();
        $post->user_id = $request->userId();
        $post->save();
        

        return redirect()->route('timeline.index');
    }
}
