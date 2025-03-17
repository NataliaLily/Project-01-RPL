@extends('layout.main')

@section('title', 'Posts')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('post.add')}}" class="btn btn-primary mb-3">Tambah Post</a>
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    @if(session('status'))
                        <div class="alert alert-danger">{{session('status')}}</div>
                    @endif
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Post Title</th>
                        <th>Post Content</th>
                        <th>Post Image</th>
                        <th>Post Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->post_title}}</td>
                        <td>{{$post->post_content}}</td>
                        <td>
                            <img src="{{route('storage', $post->post_image)}}" alt="Post Image" style="width: 50px; height: 50px">
                        </td>
                        <td>{{$post->category->category_name}}</td>

                        <td>
                            <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
@endsection