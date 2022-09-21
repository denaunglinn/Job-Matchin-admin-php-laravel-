<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostListResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category_name' => $this->category ? $this->category->title : '-',
            'sub_category_name' => $this->category->sub_category ? $this->category->sub_category->title : '-',
            'image' => $this->photos[0]->photo_path(),
        ];
    }
}
