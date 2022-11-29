@extends('layout')
@section('titel')
    Veranstaltung anlegen
@endsection

@section('content')
    <main class="main">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('veranstaltung.store') }}" method="POST" autocomplete="off">
            @csrf

            <div>
                <label for="titel">Veranstaltungstitel*: </label>
                <input class="form-control" type="text" id="titel" name="titel" autocomplete="off" required autofocus>
            </div>
            <div class="form-group">
                <label for="ort">Veranstaltungsort*: </label>
                <input class="form-control" type="text" id="ort" name="ort" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="startzeit">Startzeit*: </label>
                <input class="form-control" type="datetime-local" id="startzeit" name="startzeit" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="endzeit">Endzeit*: </label>
                <input class="form-control" type="datetime-local" id="endzeit" name="endzeit" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="user_id">Benutzer*: </label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" selected>Benutzer auswählen</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" id="saveButton">Speichern</button>
        </form>
    </main>
@endsection
