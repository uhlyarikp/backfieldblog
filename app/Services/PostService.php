<?php

namespace App\Services;
use App\Models\Post;

/**
 * Class PostService.
 */
class PostService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $data)
    {
        return Post::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Post
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $data, string $id): Post
    {
        $post = Post::findOrFail($id);
        return $post->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post){
            $post->delete();
        }
    }
}
