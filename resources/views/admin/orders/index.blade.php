@extends('admin.layout.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Orders</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th width="200px">User</th>
                            <th width="200px">Price</th>
                            <th>Email</th>
                            <th>City</th>
                        </tr>
                        </thead>
                       <tbody>

                       @foreach($orders as $order)
                       <tr>
                           <td>{{$order->order_number}}</td>
                           <td>{{$order->user->name}}</td>
                           <td>{{$order->total_price}}$</td>
                           <td>{{$order->email_address}}</td>
                           <td>{{ucwords($order->city)}}</td>
                       </tr>
                       @endforeach
                       </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
