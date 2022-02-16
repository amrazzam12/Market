@extends('admin.layout.master')


@section('content')

    <h1 class="text-center mb-5 mt-5">Edit User</h1>
    <div class="container">
        <form action="{{url('/users/'. $user['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Username" value="{{$user['name']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="email" class="col-form-label">Email</label>
                </div>
                <div class="col-10">
                    <input type="email" name="email" id="email" required="required" class="form-control" autocomplete="off" placeholder="Email" value="{{$user['email']}}">
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
                    Admin <input type="radio" name="role" value="admin" class="mr-5" @if($user['role'] == 'admin') checked @endif>
                    Vendor <input type="radio" name="role" value="vendor" class="mr-5"  @if($user['role'] == 'vendor') checked @endif>
                    Customer <input type="radio" name="role" value="customer" class="mr-5"  @if($user['role'] == 'customer') checked @endif>

                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Add</button>
                </div>
            </div>
@endsection
