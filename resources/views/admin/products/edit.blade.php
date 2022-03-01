@extends('admin.layout.master')


@section('content')

    <h1 class="text-center mb-5 mt-5">Edit Product</h1>
    <div class="container">
        <form action="{{url('admin/products/'. $product['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Username" value="{{$product['title']}}">
                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Edit</button>
                </div>
            </div>
@endsection
