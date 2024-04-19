<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Posts;

class PostController extends Controller
{
    protected PostService $postService;
    public function __construct(){
        $this->postService = new PostService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->index();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $this->postService->store($request->toArray());
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        if ($post->deleted_at) {
            return response()->json(['message' => 'Post have been deleted'], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($post);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        $post->update($request->all());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        $post->deleted_at = now();
        $post->save();
        return response()->json(['message' => 'Post deleted'], Response::HTTP_NO_CONTENT);
    }
}
