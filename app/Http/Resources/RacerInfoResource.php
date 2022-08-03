<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RacerInfoResource extends JsonResource
{
    public static $wrap = 'racer_info';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "abbreviation" => $this['abbreviation'],
            "name" => $this['name'],
            "team" => $this['team'],
            "start_date" => explode('_',$this['start_date_time'])[0],
            "start_time" => explode('_',$this['start_date_time'])[1],
            "end_date" => explode('_',$this['end_date_time'])[0],
            "end_time" => explode('_',$this['end_date_time'])[1],
            "lap_time" => $this['lap_time']
        ];
    }
}
