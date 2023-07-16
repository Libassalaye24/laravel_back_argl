<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResourceWeb;
use App\Http\Resources\UserResourceMobile;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    //


     /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        return ["data" => UserResourceWeb::collection(User::paginate(5)) , "code"=>Response::HTTP_OK];
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(RegisterRequest $request)
    {
        //

        $user = User::create(
            $request->only('nom','prenom','email')
            +[
                "password" => Hash::make($request->password)
            ]
        );
        $texte = 'Nous sommes ravis de vous informer que votre inscription sur notre plateforme a été effectuée avec succès. Bienvenue dans notre communauté ';
        Outil::sendEmail($user->email , ' Confirmation d\'inscription réussie' , $texte , $user );  
        return new UserResourceWeb($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return new UserResourceWeb($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update($request->only('nom','prenom','email')+[
            "password" => Hash::make($request->password)
        ]);
        return new UserResourceWeb($user);

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

    public function infoUser() {
        $user = Auth::user();
        dd($user);
        $user = User::findOrFail($user->id);
        return new UserResourceWeb($user);
    }


    public function updateInfos(Request $request){
        $user = Auth::user();
        $user = User::findOrFail($user->id);
        $user->update($request->only('nom','prenom','email'));
        return new UserResourceWeb($user);
    }

    public function updatePassword(Request $request){
        $user = Auth::user();
        $user = User::findOrFail($user->id);
        $user->update($request->only('password','prenom','email'));
        return new UserResourceWeb($user);
    }
}
