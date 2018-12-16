<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'team' => new TeamResource($this->team),
            'created_at' => Carbon::parse($this->created_at)->format('d-M-Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-M-Y H:i:s')
        ];
    }
}
