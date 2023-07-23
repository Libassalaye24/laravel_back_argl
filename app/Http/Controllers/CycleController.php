<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Traits\RequestTrait;
use Illuminate\Http\Request;
use App\Http\Requests\SimpleRequest;
use App\Http\Resources\CyclesResourceWeb;
use App\Http\Resources\SimpleResourceWeb;

class CycleController extends Controller
{
    use RequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $join =  $this->join($request);
        // dd($join);
        if ($join != false) {

            return Cycle::with($join)->paginate(3);
        }
        return SimpleResourceWeb::collection(Cycle::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SimpleRequest $request)
    {
        //
        $cycle = Cycle::create(
            $request->libelle
        );

        return new SimpleResourceWeb($cycle);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Cycle $cycle)
    {
        //
     
        return new CyclesResourceWeb($cycle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
