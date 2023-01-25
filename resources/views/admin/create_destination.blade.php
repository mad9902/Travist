@extends('layouts.app')

@section('judul')
    Tambah Destinasi
@endsection

@section('content')
    <div class="container mt-3">
        <h2 class="fw-bold text-info">Tambah Destinasi</h2>
        <p class="fw-bold text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi consequuntur amet necessitatibus! Quam veniam
        </p>
        <div class="row">
            <div class="col-md-7">
                <form action="{{ route('create_travel_list') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Gambar Destinasi</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Destinasi</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" placeholder="Judul Destinasi">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Harga Tiket</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price') }}" placeholder="Harga Tiket">
                                </div>
                                @error('price')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Diskon <span
                                        class="text-sm text-secondary">*opsional</span></label>
                                <input type="number" name="discount"
                                    class="form-control @error('discount') is-invalid @enderror"
                                    value="{{ old('discount') }}" placeholder="Diskon">
                                @error('discount')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Deskripsi">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-info text-white fw-bold w-100">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/illustration.png') }}" alt="images" class="w-100">
            </div>
        </div>
    </div>
@endsection
