@extends('layout.main')
@section('title', 'Reset Password')
@section('content')

    <section class="content">
        <div class="container-fluid">
            @if (session()->has('pesan'))
                <div class="alert alert-{{ session()->get('pesan')[0] }}">
                    {{ session()->get('pesan')[1] }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.ProsesResetPassword') }}" method="post">
                        @csrf
                        <div class="col-lg-12">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="old_password" value="{{ old('old_password') }}"
                                class="form-control">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password" value="{{ old('new_password') }}"
                                class="form-control">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="c_new_password" value="{{ old('c_new_password') }}"
                                class="form-control">
                            @error('c_new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <p></p>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Reset</button>
                            <a href="{{ route('dashboard.ProsesResetPassword') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- @extends('layout.main')
@section('title', 'Reset Password')
@section('content')
    <div class="container-fluid">
        @if (@session()->has('pesan'))
            <div class="alert alert--{{ session()->get('pesan')[0] }}">
                {{ session()->get('pesan')[1] }}
            </div>
        @endif
        <form action="{{ route('dashboard.ProsesResetPassword') }}" method="post">

            @csrf
                <div class="col-lg-4">
                    <label class="form-label">Password Lama</label>
                    <input type="password" name="old_password" value="{{old('old_password')}}" class="form-control @error('old_password')">
                    @error('old_password')
                    <span style=".......">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="new_password" value="{{old('new_password')}}" class="form-control @error('new_password')">
                    @error('new_password')
                    <span style=".......">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-lg-4">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="c_new_password" value="{{old('c_new_password')}}" class="form-control @error('c_new_password')">
                    @error('c_new_password')
                    <span style=".......">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('dashboard.ProsesResetPassword') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    </section>
@endsection --}}
