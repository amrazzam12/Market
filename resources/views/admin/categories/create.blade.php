@extends('admin.layout.master')


@section('content')

    <h1 class="text-center mb-5 mt-5">Add Category</h1>
    <div class="container">
        <form action="{{url('admin/categories')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Name">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="about" class="col-form-label">About</label>
                </div>
                <div class="col-10">
                    <input type="text" name="slug" id="about" required="required" class="form-control" autocomplete="off" placeholder="About Category">
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
                    <label for="parent" class="col-form-label">Parent</label>
                </div>
                <div class="col-10">
                    <select id="parent" name="parent_id" class="form-control">
                       @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="status" class="col-form-label">Status</label>
                </div>
                <div class="col-10">
                    Active <input type="radio" name="status" value="active" class="mr-5" >
                    InActive <input type="radio" name="status" value="inactive" class="mr-5">

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Add</button>
                </div>
            </div>


        @if($errors->any())
            @foreach($errors->all() as $error )
                <div class="alert alert-danger mt-2">{{$error}}</div>
            @endforeach
        @endif
@endsection
