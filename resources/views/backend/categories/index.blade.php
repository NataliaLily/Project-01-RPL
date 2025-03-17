@extends('layout.main')

@section('title', 'list Categories')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('category.add')}}" class="btn btn-primary mb-3">Tambah Category</a>
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
                        <th>Nama Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                                </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{($category->status == 1) ? 'aktif' : "Tidak Aktif" }}</td>
                        <td>
                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            
                            {{--Konfirmasi Delete--}}
                            <form id="delete-kategori-{{$category->id}}" action="{{route('category.delete', $category->id)}}" method="post" style="display:none;">
                                @csrf
                            </form>
                            <a onclick="confirmDelete({{$category->id}})" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>

    <script>
        function confirmDelete(id){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(()=>{
                        document.getElementById('delete-kategori-' + id).submit();
                    });
                }
            });
       }
    </script>
@endsection