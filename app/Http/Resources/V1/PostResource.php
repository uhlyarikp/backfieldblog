<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'post_title' => $this->post_title,
            'post_content' => $this->post_content,
            'post_category' => $this->post_category,
            'author'=>$this->author,
            'created_at' => $this->created_at,
        ];
    }
}