
@extends('layout.main')
@section('title', 'ubah Post')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <form action="{{route('post.update')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <label for="post_title">Judul Berita</label>
                        <br>
                        <label for="post_image">Gambar Berita</label>
                        <br>
                        <label for="category_id">Kategori Berita</label>
                        <br>
                        <label for="post_content">Isi Berita</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="post_title" class="form-control" value="{{$post->post_title}}">
                        <input type="file" name="post_image" class="form-control @error('post_image') is-invalid @enderror" accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">

                        @error('post_title')
                        <img id="tampilFoto" onerror="this.onerror=null; this.src='https://www.shutterstock.com/id/image-illustration/no-picture-available-placeholder-thumbnail-icon-2179364083'" src="" alt="" width="15%">
                        @enderror
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            @foreach($categories as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="post_content"class="form-control" value="{{$post->post_content}}">
                        @error('category_id')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}
                            @enderror
                        </span>

                        <input type="hidden" name="id" value="{{$post->id}}">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                        
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection