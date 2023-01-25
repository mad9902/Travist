@extends('layouts.app')

@section('judul')
    Lupa Password
@endsection

@section('content')
    <div class="background" style="padding: 200px 0;">
        <div class="col-md-4 mx-auto auth-background rounded p-5">
            <h2 class="fw-bold">Lupa Password</h2>
            <form method="GET" action="{{ route('reset_password') }}">
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

                <div class="mb-3">
                    <button type="submit" class="btn btn-info fw-bold text-white">
                        Kirim Link Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
