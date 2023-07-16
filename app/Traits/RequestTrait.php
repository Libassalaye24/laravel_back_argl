<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait RequestTrait {



    public function join(Request $request) {

        if ($request->has('join')) {
            $joins = [] ;
            if(strpos($request->get('join'), ',') !== false) {

                $explode = explode(',', $request->get('join'));
                $joins[] = $explode[0];
                $firstrelation = $explode[0];
                for ($i=1; $i < count($explode) ; $i++) {
                    $joins[] = $firstrelation.".".$explode[$i];
                }
                return $joins;
            }

            return $request->get('join');
        }
        return false;
    }

    public function joinOne(Request $request) {

    }

}


