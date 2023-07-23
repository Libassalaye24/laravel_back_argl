<?php

namespace App\Http\Controllers;

use App\Http\Requests\NiveauxRequest;
use App\Http\Requests\SimpleRequest;
use App\Http\Resources\NiveauxResourceWebC;
use App\Http\Resources\SimpleResourceWeb;
use App\Models\Niveau;
use App\Traits\RequestTrait;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    use RequestTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $join =  $this->join($request);
    //    dd($join);
       if ($join != false) {
            return Niveau::with($join)->get();
       }
        //
        return SimpleResourceWeb::collection( Niveau::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NiveauxRequest $request)
    {
        //
        $niveau = Niveau::create(
           [
            "libelle" => $request->libelle,
            "cycle_id" => $request->cycle_id,
           ]
        );

        return new NiveauxResourceWebC($niveau);
    }

    /**
     * Display the specified resource.
     *
     * @param  Niveau $niveau
     * @return \Illuminate\Http\Response
     */
    public function show(Niveau $niveau)
    {
        //
        return new NiveauxResourceWebC($niveau);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function update(NiveauxRequest $request, Niveau $niveau)
    {
        //
        $niveau->update($request->only('libelle','cycle_id'));
        return new NiveauxResourceWebC($niveau);
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
