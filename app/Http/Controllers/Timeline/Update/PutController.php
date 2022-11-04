<?php

namespace App\Http\Controllers\Timeline\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Timeline\UpdateRequest;
use App\Services\PostService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, PostService $postService)
    {
        //
        if (!$postService->checkOwnPost($request->user()->id, $request->id())) {
            throw new AccessDeniedHttpException();
        }

        $post = Post::where('id', $request->id())->firstOrFail();
        $post->content = $request->content();
        $post->save();

        return redirect()
            ->route('timeline.index')
            ->with('feedback.success', "編集しました");
    }
}
