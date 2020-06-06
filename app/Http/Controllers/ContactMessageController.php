<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Mail\ContactMessageNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'message' => 'required|min:10'
        ]);

        $contactMessage = new ContactMessage();
        $contactMessage->name = $request['name'];
        $contactMessage->email = $request['email'];
        $contactMessage->message = $request['message'];
        $contactMessage->save();

        // Try to send mail with reset link
        try {
            Mail::to(env('MAIL_FROM_ADDRESS', 'test@test.fr'))->send(new ContactMessageNotification);
        } catch(Exception $e) {
            Log::alert('EMAIL ERROR : ' . $e->getMessage());
        }

        return back()->with(['success' => 'Votre message nous a bien été envoyé.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactMessage  $contactMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}
