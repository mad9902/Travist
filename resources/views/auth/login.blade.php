@extends('layouts.app')

@section('judul')
    Login
@endsection

@section('content')
    <div class="background" style="padding: 100px 0;">
        <div class="col-md-4 mx-auto auth-background rounded p-5" style="margin-bottom: 100px">
            <h2 class="fw-bold">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email') }}">
                    <label>Email</label>

                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" value="{{ old('password') }}">
                    <label>Password</label>

                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-info fw-bold text-white">
                        Masuk
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-white fw-bold" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
