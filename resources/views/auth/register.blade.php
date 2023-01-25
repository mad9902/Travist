@extends('layouts.app')

@section('judul')
    Register Akun
@endsection

@section('content')
    <div class="background" style="padding: 100px 0;">
        <div class="col-md-4 mx-auto auth-background rounded p-5">
            <h2 class="fw-bold">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nama Lengkap" value="{{ old('name') }}">
                    <label>Nama Lengkap</label>

                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                    <input type="number" name="phone_number"
                        class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nomor Telepon"
                        value="{{ old('phone_number') }}">
                    <label>No. Telepon</label>

                    @error('phone_number')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Tinggal"
                        style="height: 100px">{{ old('address') }}</textarea>
                    <label>Alamat Tinggal</label>

                    @error('address')
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
                        Daftar Sekarang
                    </button>

                    <a class="btn btn-link text-white fw-bold" href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
