
@extends('layout.main')
@section('title', 'ubah Kategori')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <form action="{{route('category.update')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <label for="name">Nama Kategori</label>
                        <br>
                        <label for="status">Status</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="name" class="form-control" value="{{$categories->name}}">
                        <select name="status" class="form-control">
                            <option value="1" {{($categories->status == 1 )? 'selected' : ''}}>Aktif</option>
                            <option value="0" {{($categories->status == 0 )? 'selected' : ''}}>Tidak Aktif</option>


                        </select>

                        <input type="hidden" name="id" value="{{$categories->id}}">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection