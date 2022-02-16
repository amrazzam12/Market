@extends('admin.layout.master')


@section('content')

    <h1 class="text-center mb-5 mt-5">Edit Category</h1>
    <div class="container">
        <form action="{{url('/categories/'. $category['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Username" value="{{$category['name']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="about" class="col-form-label">About</label>
                </div>
                <div class="col-10">
                    <input type="text" name="about" id="about" required="required" class="form-control" autocomplete="off" placeholder="Email" value="{{$category['slug']}}">
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
                    <select id="parent" name="parent" class="form-control">

                             <option hidden selected value="{{$category->parentCategory->id}}">{{$category->parentCategory->name}}</option>
                        <optgroup label="Select Category">
                    @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="role" class="col-form-label">Status</label>
                </div>
                <div class="col-10">
                    Active <input type="radio" name="status" value="active" class="mr-5"  @if($category->status == 'active') checked @endif>
                    InActive <input type="radio" name="status" value="inactive" class="mr-5"  @if($category->status == 'inactive') checked @endif>

                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Edit</button>
                </div>
            </div>
@endsection
