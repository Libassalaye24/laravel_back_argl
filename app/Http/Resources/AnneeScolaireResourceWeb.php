<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnneeScolaireResourceWeb extends JsonResource
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
            "etat" => $this->etat,
            "etat_text" => $this->resolveEtat($this->etat)
        ];
    }

    public function resolveEtat($etat)
    {
        $etat_text = 'Off';
        if ($etat == 1) {
            $etat_text = 'On';
        }
        return $etat_text;
    }
}
