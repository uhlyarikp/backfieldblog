<?php

namespace App\Services;
use App\Models\Posts;

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
        return Posts::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(array $data)
    {
        return Posts::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Posts
    {
        return Posts::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $data, string $id): Posts
    {
        $post = Posts::findOrFail($id);
        return $post->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::find($id);
        if ($post){
            $post->delete();
        }
    }
}
