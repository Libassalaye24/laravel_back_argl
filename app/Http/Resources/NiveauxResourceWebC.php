<?php

namespace App\Http\Resources;

use App\Models\Cycle;
use Illuminate\Http\Resources\Json\JsonResource;

class NiveauxResourceWebC extends JsonResource
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
            "id" => $this->id,
            "libelle" => $this->libelle,
            "cycle" => $this->resolveCycle($this->cycle_id),
        ];
    }

    public function resolveCycle($cycleId) {
        $c = Cycle::find($cycleId);
        if ($c) {
            return $c->libelle;
        }
    }
}
