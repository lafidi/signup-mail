@extends('layout')
@section('titel')
    Veranstaltungsanmeldung
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
                <table id="veranstaltungstabelle" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Ort</th>
                        <th>Startzeit</th>
                        <th>Endzeit</th>
                        <th>anmelden</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($veranstaltungen as $veranstaltung)
                        <tr>
                            <td>{{ $veranstaltung->titel }}</td>
                            <td>{{ $veranstaltung->ort }}</td>
                            <td>{{ $veranstaltung->startzeit }}</td>
                            <td>{{ $veranstaltung->endzeit }}</td>
                            <td>
                                <a href="{{ route('anmeldung', $veranstaltung->id) }}" class="btn btn-primary" style="float: left;"><i class="nav-icon bi bi-plus-square-fill"></i></a>
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
                        <th>anmelden</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
