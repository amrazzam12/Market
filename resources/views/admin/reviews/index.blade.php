@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Reviews</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th width="200px">Product</th>
                            <th width="200px">Rating</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                       <tbody>

                       @foreach($reviews as $review)
                       <tr>
                           <td>{{$review->user->name}}</td>
                           <td>{{$review->product->title}}</td>
                           <td>{{$review->rating}}</td>
                           <td>{{$review->comment}}</td>
                       </tr>
                       @endforeach
                       </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
