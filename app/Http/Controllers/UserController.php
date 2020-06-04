<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use \App\Mail\User\ResetPasswordLink;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
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

    public function resetPassword(Request $request)
    {
        User::validatorResetPassword($request)->validate();

        if (null === $user = User::where('id', $request['id'])->first()) {
            return back()->withErrors('L\'identifiant n\'est pas valide.');
        }

        if ($user->resetPasswordToken !== $request['token']) {
            return back()->withErrors('Le token n\'est pas valide.');
        }

        $user->password = Hash::make($request['new_password']);
        $user->save();

        return redirect(route('customer_area.login'))->with(['success' => 'Votre mot de passe a été modifié avec succés.']);
    }

    public function sendPasswordResetLink(Request $request)
    {
        // Check if user exists
        if (null === $user = User::where('email', $request['email'])->first()) {
            return back()->withErrors(['email' => 'Aucun compte n\'existe avec cette adresse email.'])
                ->withInput();
        }

        // Create the new reset passwork token
        $user->resetPasswordToken = bin2hex(random_bytes(5));
        $user->save();

        // Try to send mail with reset link
        try {
            Mail::to($user->email)->send(new ResetPasswordLink($user->id, $user->resetPasswordToken));
        } catch(Exception $e) {
            Log::alert('EMAIL ERROR : ' . $e->getMessage());
        }

        return back()->with(['success' => 'Un lien de réinitialisation vous a été envoyé par email.']);
    }
}
