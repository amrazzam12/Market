@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Banners</h1>

        <a href="{{url('products') . ''}}">Main Products</a>
        <a class="ml-5" href="{{url('products') . '?query=subproducts'}}">Sub Products</a>

        <div class="card shadow mb-4">
           <x-addButton :section="'banners'" :model="'Banner'" />
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>title</th>
                            <th width="200px">Slug</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Operations</th>

                        </tr>
                        </thead>
                       <tbody>

                       @foreach($banners as $banner)

                       <tr>

                           <td>{{$banner->title}}</td>
                           <td>{{$banner->slug}}</td>
                           <td>{{$banner->desc}}</td>
                           <td><img src="{{$banner->image}}" class="rounded ml-2" height="80px" width="80px"></td>

                           <td>{{ucwords($banner->status)}}</td>

                           <td>
                              <x-opButtons :section="'banners'" :model="$banner['id']" />
                           </td>
                       </tr>
                       @endforeach
                       </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
