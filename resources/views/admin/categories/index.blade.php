@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Categories</h1>

        <a href="{{url('categories') . ''}}">Main Categories</a>
        <a class="ml-5" href="{{url('categories') . '?query=subcategories'}}">Sub Categories</a>

        <div class="card shadow mb-4">
           <x-addButton :section="'categories'" :model="'Category'" />
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th width="200px">About</th>
                            <th>Photo</th>
                            <th>Parent Category</th>
                            <th width="200px">Sub Categories</th>
                            <th>Status</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                       <tbody>

                       @foreach($categories as $category)

                       <tr>

                           <td>{{$category->name}}</td>
                           <td>{{$category->slug}}</td>
                           <td><img src="{{$category->image}}" class="rounded ml-2" height="80px" width="80px"></td>
                           <td>{{$category->parentCategory->name}}</td>
                           <td>
                               @if(count($category->subCategories) == 0 ) None @endif

                               @foreach($category->subCategories as $sub)
                                    {{$sub->name . ' , '}}
                               @endforeach

                           </td>
                           <td>{{ucwords($category->status)}}</td>
                           <td>
                              <x-opButtons :section="'categories'" :model="$category['id']" />
                           </td>
                       </tr>
                       @endforeach
                       </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection
