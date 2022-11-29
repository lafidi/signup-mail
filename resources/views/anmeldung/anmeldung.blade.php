@extends('layout')
@section('titel')
    Anmeldung zu {{ $veranstaltung->titel }}
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

        <form action="{{ route('anmeldungsmail', $veranstaltung->id) }}" method="POST" autocomplete="off">
            @csrf
            @method('POST')

            <div>
                <label for="vorname">Vorname*: </label>
                <input class="form-control" type="text" id="vorname" name="vorname" value="" autocomplete="off" required autofocus>
            </div>
            <div>
                <label for="nachname">Nachname*: </label>
                <input class="form-control" type="text" id="nachname" name="nachname" value="" autocomplete="off" required>
            </div>
            <div>
                <label for="drkserver">drkserver-Nummer*: </label>
                <input class="form-control" type="text" id="drkserver" name="drkserver" value="" autocomplete="off" required>
            </div>
            <div>
                <label for="email">E-Mail-Adresse*: </label>
                <input class="form-control" type="email" id="email" name="email" value="" autocomplete="off" required>
            </div>

            <button class="btn btn-primary" id="saveButton">Speichern</button>
        </form>
    </main>
@endsection
