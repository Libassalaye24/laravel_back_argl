<?php

namespace Database\Seeders;

use App\Models\Cycle;
use App\Models\Niveau;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Classe::factory(5)->create();
        // Cycle::insert([
        //     ["libelle"=>"Elementaire"],
        //     ["libelle"=>"Moyen"],
        //     ["libelle"=>"Secondaire"],
        // ]);

        // $cycle= Cycle::where(["libelle"=>"Elementaire"])->first();
        //     Niveau::insert([
        //         ["libelle"=>"CI","cycle_id"=> $cycle->id],
        //          ["libelle"=>"CP","cycle_id"=> $cycle->id],
        //          ["libelle"=>"CE1","cycle_id"=> $cycle->id],
        //          ["libelle"=>"CE2","cycle_id"=> $cycle->id],
        //          ["libelle"=>"CM1","cycle_id"=> $cycle->id],
        //          ["libelle"=>"CM2","cycle_id"=> $cycle->id]
        //     ]);
        //    $cycle=Cycle::where(["libelle"=>"Moyen"])->first();
        //     Niveau::insert([
        //         ["libelle"=>"6ieme","cycle_id"=> $cycle->id],
        //          ["libelle"=>"5ieme","cycle_id"=> $cycle->id],
        //          ["libelle"=>"4ieme1","cycle_id"=> $cycle->id],
        //          ["libelle"=>"3ieme","cycle_id"=> $cycle->id],

        //     ]);

        //    $cycle=Cycle::where(["libelle"=>"Secondaire"])->first();
        //       Niveau::insert([
        //         ["libelle"=>"2nd","cycle_id"=> $cycle->id],
        //          ["libelle"=>"1ere","cycle_id"=> $cycle->id],
        //          ["libelle"=>"Tle","cycle_id"=> $cycle->id],
        //       ]);

    }
}
