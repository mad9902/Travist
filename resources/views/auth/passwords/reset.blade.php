@extends('layouts.app')

@section('judul')
    Reset Password
@endsection

@section('content')
    <div class="background" style="padding: 150px 0;">
        <div class="col-md-4 mx-auto auth-background rounded p-5">
            <h2 class="fw-bold">Reset Password</h2>
            <form method="POST" action="{{ route('password.update') }}">
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

                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Konfirmasi Password" value="{{ old('password_confirmation') }}">
                    <label>Konfirmasi Password</label>

                    @error('password_confirmation')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-info fw-bold text-white">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
