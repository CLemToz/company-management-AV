<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'industry' => $this->industry,
            'tags' => $this->tags,
            'address' => $this->address,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // Optional related data
            'notes' => $this->whenLoaded('notes'),
            'documents' => $this->whenLoaded('documents'),
            'projects' => $this->whenLoaded('projects'),
            'assignments' => $this->whenLoaded('assignments'),
        ];
    }
}
