@extends('layout')
@section('titel')
    Veranstaltungsverwaltung
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <a href="{{ route('veranstaltung.create') }}" class="btn btn-primary">Neue Veranstaltung anlegen</a>
                <table id="veranstaltungstabelle" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Ort</th>
                        <th>Startzeit</th>
                        <th>Endzeit</th>
                        <th>Benutzer</th>
                        <th>bearbeiten</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($veranstaltungen as $veranstaltung)
                        <tr>
                            <td>{{ $veranstaltung->titel }}</td>
                            <td>{{ $veranstaltung->ort }}</td>
                            <td>{{ $veranstaltung->startzeit }}</td>
                            <td>{{ $veranstaltung->endzeit }}</td>
                            <td>{{ \App\Models\User::find($veranstaltung->user_id)->first()->name }}</td>
                            <td>
                                <a href="{{ route('veranstaltung.edit', $veranstaltung->id) }}" class="btn btn-primary" style="float: left;"><i class="nav-icon bi bi-pencil-fill"></i></a>
                                <form class="delete" style="float: right;"
                                      action="{{ route('veranstaltung.destroy', $veranstaltung->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="nav-icon bi bi-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Titel</th>
                        <th>Ort</th>
                        <th>Startzeit</th>
                        <th>Endzeit</th>
                        <th>Benutzer</th>
                        <th>bearbeiten</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
