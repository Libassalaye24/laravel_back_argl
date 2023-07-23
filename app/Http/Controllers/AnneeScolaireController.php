<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use App\Http\Resources\SimpleResourceWeb;
use App\Http\Requests\AnneeScolaireRequest;
use App\Http\Requests\SimpleRequest;
use App\Http\Resources\AnneeScolaireResourceWeb;

class AnneeScolaireController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AnneeScolaireResourceWeb::collection(AnneeScolaire::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AnneeScolaireRequest $request)
    {
        //
        $annee = AnneeScolaire::create(
            $request->only('libelle')+['etat' => 0]
        );

        return new AnneeScolaireResourceWeb($annee);

    }

    /**
     * Display the specified resource.
     *
     * @param  AnneeScolaire $annee
     * @return \Illuminate\Http\Response
     */
    public function show(AnneeScolaire $annee)
    {
        //
        return new AnneeScolaireResourceWeb($annee);
    }

    public function infosAnneeEncours() {
        // recuperer l'annee en cours
        $annee = AnneeScolaire::where('etat' , 1)->first();
        // dd($annee);
        return new AnneeScolaireResourceWeb($annee);
    }

    public function updateAnneeScolaireEncours(Request $request, $id) {
        // recuperer l'annee en cours
        $encours = AnneeScolaire::where('etat' , 1)->first();
        if ($encours) {
            $encours->update(['etat' => 0]);
        }
        $annee = AnneeScolaire::find($id);
        if ($annee) {
            $annee->update(["etat" => 1]);
        }
        return new AnneeScolaireResourceWeb($annee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AnneeScolaireRequest $request, AnneeScolaire $annee)
    {
        //
        $annee->update($request->only('libelle'));
        return new AnneeScolaireResourceWeb($annee);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
