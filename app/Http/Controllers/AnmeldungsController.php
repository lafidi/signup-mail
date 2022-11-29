<?php

namespace App\Http\Controllers;

use App\Mail\AnmeldeMail;
use App\Models\User;
use App\Models\Veranstaltung;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class AnmeldungsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static public function index()
    {
        $veranstaltungen = Veranstaltung::all()->sortBy('startzeit');

        return view('anmeldung.index')->with('veranstaltungen', $veranstaltungen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Veranstaltung $veranstaltung
     * @return Response
     */
    public function anmeldung(Veranstaltung $veranstaltung)
    {
        return view('anmeldung.anmeldung')->with('veranstaltung', $veranstaltung);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Veranstaltung $veranstaltung
     * @return \Illuminate\Http\Response
     */
    public function email(\Illuminate\Http\Request $request, Veranstaltung $veranstaltung)
    {
        $request->validate([
            'vorname' => 'string|required',
            'nachname' => 'string|required',
            'drkserver' => 'string|required',
            'email' => 'string|required',
        ]);

        Mail::to(User::find($veranstaltung->user_id)->first()->email)->send(new AnmeldeMail($veranstaltung, $request->nachname, $request->vorname, $request->drkserver, $request->email));

        return redirect()->route('anmeldungsuebersicht')->with('success', 'Anmeldung für ' . $request->vorname . " " . $request->nachname . " gesendet");
    }
}
