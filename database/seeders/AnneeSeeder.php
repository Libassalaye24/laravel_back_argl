<?php

namespace Database\Seeders;

use App\Models\AnneeScolaire;
use Illuminate\Database\Seeder;

class AnneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $annees = [
            [
                'libelle' => '2021-2022',
                'etat' => 0
            ],
            [
                'libelle' => '2022-2023',
                'etat' => 1
            ],
            [
                'libelle' => '2023-2024',
                'etat' => 0
            ],
        ];

        foreach ($annees as $value) {
            # code...
            $annee = AnneeScolaire::where("libelle" , $value['libelle'])->first();
            if (!$annee) {
                $annee = new AnneeScolaire();
            }
            $annee->libelle = $value['libelle'];
            $annee->etat = $value['etat'];
            $annee->save();
        }
    }
}
