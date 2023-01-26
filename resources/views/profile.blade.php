@extends('layouts.app')

@section('judul')
    Profile
@endsection

@section('content')
    <div class="background" style="padding: 100px 0;">
        <div class="col-md-4 mx-auto auth-background rounded p-5">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <h2 class="fw-bold">Edit Profil</h2>
            <form method="POST" action="{{ route('edit_profile') }}">
                @csrf
                @method('put')
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nama Lengkap" value="{{ old('name') == null ? Auth::user()->name : old('name') }}">
                    <label>Nama Lengkap</label>

                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email') == null ? Auth::user()->email : old('email') }}">
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
                        value="{{ old('phone_number') == null ? Auth::user()->phone_number : old('phone_number') }}">
                    <label>No. Telepon</label>

                    @error('phone_number')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Tinggal"
                        style="height: 100px">{{ old('address') == null ? Auth::user()->address : old('address') }}</textarea>
                    <label>Alamat Tinggal</label>

                    @error('address')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-info fw-bold text-white">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
