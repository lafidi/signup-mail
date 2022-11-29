@extends('layout')
@section('titel')
    Benutzer anlegen
@endsection

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('benutzer.store') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name &hellip;" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="E-Mail &hellip;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password &hellip;">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="confirm_password">Passwort wiederholgen</label> <br>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Passwort wiederholgen &hellip;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                    <button type="reset" class="btn btn-default">Änderungen löschen</button>
                </div>
            </div>
        </form>
    </div>
@endsection
