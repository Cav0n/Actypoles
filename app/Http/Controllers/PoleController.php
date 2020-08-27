<?php

namespace App\Http\Controllers;

use App\Pole;
use App\PoleI18n;
use Illuminate\Http\Request;

class PoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poles = Pole::all();

        return view('pages.admin.poles')->with(['poles' => $poles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.forms.pole');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PoleI18n::validator($request)->validate();

        if (null === $code = $request['code'] ?? null) {
            $code = preg_replace('/\s+/', '-', $request['title']);
        }

        if (Pole::where('code', $code)->exists()) {
            return back()->withInput()->withErrors(['title' => 'Un pôle avec un code identique existe déjà.']);
        }

        $pole = new Pole();
        $pole->code = $code;
        $pole->save();

        $poleI18n = new PoleI18n();
        $poleI18n->pole_id = $pole->id;
        $poleI18n->lang = $request['lang'] ?? null;
        $poleI18n->title = $request['title'];
        $poleI18n->description = $request['description'];
        $poleI18n->save();

        return redirect(route('admin.poles.edit', ['pole' => $pole]))->with(['success' => 'Le pôle a été créé avec succés.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function show(Pole $pole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function edit(Pole $pole)
    {
        return view('pages.admin.forms.pole')->with(['pole' => $pole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pole $pole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pole $pole)
    {
        //
    }
}
