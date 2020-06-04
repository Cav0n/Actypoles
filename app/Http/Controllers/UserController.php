<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updatePersonalInformations(Request $request, User $user)
    {
        User::validatorPersonalInformations($request)->validate();

        $user->firstname = ucfirst($request['firstname']);
        $user->lastname = strtoupper($request['lastname']);
        $user->save();

        return back()->with(['success' => 'Vos informations ont été modifiées avec succés.']);
    }

    public function updatePassword(Request $request, User $user)
    {
        User::validatorNewPassword($request)->validate();

        if (! Hash::check($request['password'], Auth::user()->password)) {
            return back()->withErrors(['password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->password = Hash::make($request['new_password']);
        $user->save();

        return back()->with(['success' => 'Votre mot de passe a été mis à jour.']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


}
