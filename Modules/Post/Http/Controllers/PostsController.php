<?php

namespace Modules\Post\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\Tag;
use Modules\Post\Http\Requests\PostCreateRequest;
use Modules\Post\Events\PostCreated;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('post::list', compact('posts'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $postStatuses = Post::postStatuses();
        $allTags      = Tag::get();
        return view('post::create', compact('postStatuses', 'allTags'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  PostCreateRequest $request
     *
     * @return Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post();
        $post = $post->storePost($request);

        if ($post && $post instanceof Post) {

            $tags      = $request->input('postTags');
            $savedTags = [];
            foreach ($tags as $key => $tag) {
                if (intval($tag) == 0) {
                    unset($tags[$key]);
                    $newTag      = Tag::create(['title' => $tag]);
                    $savedTags[] = $newTag->id;
                }
            }
            $tags = array_map(function ($item) {
                return intval($item);
            }, $savedTags);
            $tags = array_unique($tags);
            $post->tags()->sync($tags);


            event(new PostCreated($post));

            return back()->with('status', trans('post::message.post_success_created'));
        }


    }



    /**
     * Show the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        return view('post::show');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int     $post_id
     *
     * @return Response
     */
    public function edit(Request $request, $post_id)
    {
        $post         = Post::find($post_id);
        $postStatuses = Post::postStatuses();
        return view('post::edit', compact('post', 'postStatuses'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param          $post_id
     *
     * @return Response
     */
    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        if ($post && $post instanceof Post) {

            $postInfo = [
                 'post_title'   => $request->input('postTitle'),
                 'post_slug'    => $request->input('postTitle'),
                 'post_content' => $request->input('postContent'),
                 'post_status'  => $request->input('postStatus'),
            ];

            $updateResult = $post->update($postInfo);


            if ($updateResult) {
                return redirect()->route('posts')->with('status', trans('post::message.post_success_updated'));
            }
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int     $post_id
     *
     * @return Response
     */
    public function delete(Request  $post_id)
    {
        $post         = Post::find($post_id);
        $deleteResult = $post->delete();
        if ($deleteResult) {
            return back()->with('status', trans('post::message.post_success_deleted'));
        }
    }
}
