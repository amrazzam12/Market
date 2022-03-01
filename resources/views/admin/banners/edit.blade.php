@extends('admin.layout.master')


@section('content')

    <h1 class="text-center mb-5 mt-5">Edit Banner</h1>
    <div class="container">
        <form action="{{url('admin/banners/'. $banner['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">title</label>
                </div>
                <div class="col-10">
                    <input type="text" name="title" id="username" required="required" class="form-control" autocomplete="off" placeholder="Username" value="{{$banner['title']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="about" class="col-form-label">Slug</label>
                </div>
                <div class="col-10">
                    <input type="text" name="slug" id="about" required="required" class="form-control" autocomplete="off" placeholder="Email" value="{{$banner['slug']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="desc" class="col-form-label">Description</label>
                </div>
                <div class="col-10">
                    <input type="text" name="desc" id="about" required="required" class="form-control" autocomplete="off" placeholder="Email" value="{{$banner['slug']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="photo" class="col-form-label">Photo</label>
                </div>
                <div class="col-10">
                    <input type="file" name="photo" id="photo" class="form-control" autocomplete="off">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="status" class="col-form-label">Status</label>
                </div>
                <div class="col-10">
                    Primary <input type="radio" name="status" value="primary" class="mr-5" >
                    Main <input type="radio" name="status" value="main" class="mr-5" >
                    Active <input type="radio" name="status" value="active" class="mr-5" >
                    Hot <input type="radio" name="status" value="hot" class="mr-5" >
                    Latest <input type="radio" name="status" value="latest" class="mr-5" >
                    InActive <input type="radio" name="status" value="inactive" class="mr-5">

                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Edit</button>
                </div>
            </div>
@endsection
