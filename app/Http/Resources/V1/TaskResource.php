<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'priority'  => $this->priority,
            'status'    => $this->status,
            'user_id'   => $this->user_id,
            'project_id'   => $this->project_id,
            'deadline'  => $this->deadline
        ];
    }
}
