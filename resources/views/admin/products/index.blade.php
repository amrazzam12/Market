@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Products</h1>

        <div class="card shadow mb-4">
           <x-addButton :section="'products'" :model="'Product'" />
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Sale</th>
                            <th>Seller</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                       <tbody>

                       @foreach($products as $product)

                       <tr>

                           <td width="300px">{{$product->title}}</td>
                           <td><img src="{{asset($product->image)}}" class="rounded ml-2" height="80px" width="80px"></td>
                           <td>{{$product->category->name}}</td>
                           <td>{{$product->price}}$</td>
                           <td>{{$product->stock}}</td>
                           <td>{{$product->sale}}%</td>
                           <td>{{$product->vendor->name}}</td>
                           <td>
                              <x-opButtons :section="'products'" :model="$product['id']" />
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
