<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RacerListResource extends JsonResource
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
            "name" => $this['name'],
            "abbreviation" => $this['abbreviation'],
            "uri" => "/api/v1/report/racers/id=".$this['abbreviation'],
            "team" => $this['team'],
        ];
    }
}
