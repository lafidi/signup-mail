@extends('layout')
@section('titel')
    Login
@endsection

@section('content')
    <p class="login-box-msg">Sign in to start your session</p>

    @error('email')
    <p class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </p>
    @enderror
    @error('username')
    <p class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </p>
    @enderror
    @error('password')
    <p class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </p>
    @enderror

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <label for="name" style="display: none;">Benutzername</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="username" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <label for="password" style="display: none;">Passwort</label>
            <input type="password" id="password" name="password" class="form-control @error('name') is-invalid @enderror @error('password') is-invalid @enderror" placeholder="Passwort">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
