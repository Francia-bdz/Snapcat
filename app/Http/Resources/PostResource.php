<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @post Post $resource
     * 
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->resource->id,
            'title' => $this->title,
            'user' => new UserResource($this->whenLoaded('user')),
            // $this->mergeWhen(Auth::user()->id == $this->post->id,[
            $this->mergeWhen(auth()->check(),[
            // $this->mergeWhen(false,[
                'content' => $this->content,
                'created_at' => $this->created_at,
        ])
            //'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
