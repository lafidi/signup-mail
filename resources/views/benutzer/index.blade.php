@extends('layout')
@section('titel')
    Benutzerverwaltung
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
                <a href="{{ route('benutzer.create') }}" class="btn btn-primary">Neuen Benutzer anlegen</a>
                <table id="benutzertabelle" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Benutzername</th>
                        <th>E-Mail-Adresse</th>
                        <th>bearbeiten</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $benutzer)
                        <tr>
                            <td>{{ $benutzer->name }}</td>
                            <td>{{ $benutzer->email }}</td>
                            <td>
                                <a href="{{ route('benutzer.edit', $benutzer->id) }}" class="btn btn-primary" style="float: left;"><i class="nav-icon bi bi-pencil-fill"></i></a>
                                <form class="delete" style="float: right;"
                                      action="{{ route('benutzer.destroy', $benutzer->id)}}"
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
                        <th>Name</th>
                        <th>E-Mail-Adresse</th>
                        <th>bearbeiten</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
