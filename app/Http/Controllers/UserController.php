<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index(){
            $user = User::all();

            return view('benutzer.index')
                ->with('user', $user);
    }

    public function create(){
            return view('benutzer.create');
    }

    public function store(Request $request){
            $validatedData = $request->validate([
                'name' => 'string|required',
                'email' => 'string|nullable',
                'password' => 'string|required|min:8|max:100',
                'confirm_password' => ['same:password'],
            ], [
                'required' => 'Das Feld :attribute ist ein Pflichtfeld',
                'string' => 'Das Feld :attribute muss ein String sein',
                'integer' => 'Das Feld :attribute muss eine Ganzzahl sein',
                'min' => 'Das Feld :attribute enthält zu wenige Zeichen (mindestens 8 sollten es sein)',
                'max' => 'Das Feld :attribute enthält zu viele Zeichen',
                'same' => 'Die Passwörter sind nicht identisch',
                'email.required' => 'E-Mail ist ein Pflichtfeld',
                'username.unique' => 'Benutzername bereits benutzt',
            ]);

            $neuerBenutzer = User::create($validatedData);
            User::find($neuerBenutzer->id)->update(['password'=> Hash::make($request->password)]);

            return redirect(route('benutzer.edit', $neuerBenutzer->id))->with('success', 'Benutzer angelegt');
    }

    public function edit($id)
    {
            $benutzer = User::find($id);

            return view('benutzer.edit')
                ->with('benutzer', $benutzer);
    }

    public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
                'name' => 'string|required',
                'email' => 'string|required',
                'password' => 'string|nullable|min:8|max:100',
                'confirm_password' => ['same:password'],
            ], [
                'required' => 'Das Feld :attribute ist ein Pflichtfeld',
                'string' => 'Das Feld :attribute muss ein String sein',
                'integer' => 'Das Feld :attribute muss eine Ganzzahl sein',
                'min' => 'Das Feld :attribute enthält zu wenige Zeichen (mindestens 8 sollten es sein)',
                'max' => 'Das Feld :attribute enthält zu viele Zeichen',
                'same' => 'Die Passwörter sind nicht identisch',
                'email.required' => 'E-Mail ist ein Pflichtfeld',
                'email.unique' => 'E-Mail bereits benutzt',
            ]);
            $benutzer = User::find($id);


            $benutzer->name = $request->name;
            $benutzer->email = $request->email;
            $benutzer->save();


            if ($request->password != null) {
                User::find($benutzer->id)->update(['password' => Hash::make($request->password)]);
            }

            return redirect(route('benutzer.index'))->with('success', 'Benutzer aktualisiert');
    }

    public function destroy($id){
            $user = User::findOrFail($id);
            $user->delete();

            return redirect(route('benutzer.index'))
                ->with('success', 'Benutzer gelöscht');
    }
}
