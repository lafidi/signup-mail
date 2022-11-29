<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Veranstaltung;
use Illuminate\Http\Response;

class VeranstaltungsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veranstaltungen = Veranstaltung::all()->sortBy('startzeit');

        return view('veranstaltung.index')->with('veranstaltungen', $veranstaltungen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->sortBy('nanme');

        return view('veranstaltung.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'titel' => 'string|required',
            'ort' => 'string|required',
            'startzeit' => 'required',
            'endzeit' => 'required',
            'user_id' => 'required',
        ]);

        Veranstaltung::create($request->all());

        return redirect(route('veranstaltung.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Veranstaltung $veranstaltung
     * @return \Illuminate\Http\Response
     */
    public function show(Veranstaltung $veranstaltung)
    {
        //TODO
        return redirect()->route('veranstaltung.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Veranstaltung $veranstaltung
     * @return Response
     */
    public function edit(Veranstaltung $veranstaltung)
    {
        $users = User::all()->sortBy('nanme');

        return view('veranstaltung.edit')->with('veranstaltung', $veranstaltung)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Veranstaltung $veranstaltung
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, Veranstaltung $veranstaltung)
    {
        $request->validate([
            'titel' => 'string|required',
            'ort' => 'string|required',
            'startzeit' => 'required',
            'endzeit' => 'required',
            'user_id' => 'required',
        ]);

        $veranstaltung->update($request->all());

        return redirect()->route('veranstaltung.index')->with('success', 'Veranstaltung ' . $request->titel . " gespeichert");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Veranstaltung $veranstaltung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veranstaltung $veranstaltung)
    {
        $veranstaltung->delete();
        return redirect()->route('veranstaltung.index')->with('success', 'Veranstaltung ' . $veranstaltung->titel . " gelöscht");
    }
}
