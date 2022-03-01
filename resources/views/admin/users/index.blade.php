@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Users</h1>

        <a href="{{url('admin/users')}}">All Users</a>
        <a class="ml-5" href="{{url('admin/users') . '?query=admins'}}">Admins</a>
        <a class="ml-5" href="{{url('admin/users') . '?query=vendors'}}">Vendors</a>
        <a class="ml-5" href="{{url('admin/users') . '?query=customers'}}">Customers</a>

        <div class="card shadow mb-4">
           <x-addButton :section="'users'" :model="'User'" />
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Photo</th>
                            <th>Role</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                       <tbody>
                       @foreach($users as $user)
                           @if($loop->iteration == 1) @continue @endif
                       <tr>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td><img src="{{$user->image}}" class="rounded ml-5" height="80px" width="80px"></td>
                           <td>{{ucwords($user->role)}}</td>
                           <td>
                              <x-opButtons :section="'users'" :model="$user['id']" />
                           </td>
                       </tr>
                       @endforeach


                       </tbody>

                    </table>
                    {{$users->links()}}
                </div>

            </div>

        </div>



    </div>
@endsection
