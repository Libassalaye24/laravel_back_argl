<?php

namespace App\Http\Resources;

use App\Models\Cycle;
use App\Models\Niveau;
use Illuminate\Http\Resources\Json\JsonResource;

class CyclesResourceWeb extends JsonResource
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
            "niveaux" => $this->niveaux->map(function ($niveau) {
                return [
                    "id" => $niveau->id,
                    "libelle" => $niveau->libelle,
                ];
            }),
        ];
    }

    // public function resolveNiveaux($niveaux) {
    //     $tabs = Niveau::where('cycle_id', $id)
    //                 ->select('id', 'libelle')
    //                      ->get();
    //     return $tabs;
    // }
}
