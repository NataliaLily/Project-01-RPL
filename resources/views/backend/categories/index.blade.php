@extends('layout.main')

@section('title','Categories')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <a href="{{route ('category.add')}}" class="btn btn-primary mb-3">Tambah Category</a>   
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
                @foreach ( $categories as $category )         
                    <tr>
                       <td>{{$loop->iteration}}</td>               
                       <td>{{$category->name}}</td>
                       <td>{{($category->status == 1)? 'Aktif' : 'Tidak Aktif'}}</td>               
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
</section>
@endsection