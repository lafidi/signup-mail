@extends('layout')
@section('titel')
    Veranstaltung bearbeiten
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

        <form action="{{ route('veranstaltung.update', $veranstaltung->id) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            <div>
                <label for="titel">Veranstaltungstitel*: </label>
                <input class="form-control" type="text" id="titel" name="titel" value="{{ $veranstaltung->titel }}" autocomplete="off" required autofocus>
            </div>
            <div class="form-group">
                <label for="ort">Veranstaltungsort*: </label>
                <input class="form-control" type="text" id="ort" name="ort" value="{{ $veranstaltung->ort }}" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="startzeit">Startzeit*: </label>
                <input class="form-control" type="datetime-local" id="startzeit" name="startzeit" value="{{ $veranstaltung->startzeit }}" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="endzeit">Endzeit*: </label>
                <input class="form-control" type="datetime-local" id="endzeit" name="endzeit" value="{{ $veranstaltung->endzeit }}" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="user_id">Benutzer*: </label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" selected>Benutzer auswählen</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id == $veranstaltung->user_id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" id="saveButton">Speichern</button>
        </form>
    </main>
@endsection
