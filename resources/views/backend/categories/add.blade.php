@extends('layout.main')
@section('title', 'Tambah Kategori')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <label for="name">Nama Kategori</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="name" class="form-control" placeholder="Nama">

                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection