@extends('admin.layout.master')


@section('content')

    <h1 class="text-center mb-5 mt-5">Add User</h1>
    <div class="container">
        <form action="{{url('admin/users')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Username" value="{{old('name')}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="email" class="col-form-label">Email</label>
                </div>
                <div class="col-10">
                    <input type="email" name="email" id="email" required="required" class="form-control" autocomplete="off" placeholder="Email" value="{{old('email')}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col-10">
                    <input type="password" name="password" id="password" required="required" class="form-control" autocomplete="off" placeholder="password" value="{{old('name')}}">
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
                    <label for="role" class="col-form-label">Role</label>
                </div>
                <div class="col-10">
                   Admin <input type="radio" name="role" value="admin" class="mr-5">
                   Vendor <input type="radio" name="role" value="vendor" class="mr-5">
                   Customer <input type="radio" name="role" value="customer" class="mr-5">

                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Add</button>
                </div>
            </div>
@endsection
