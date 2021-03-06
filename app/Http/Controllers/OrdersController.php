<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index() {
        return view('admin.orders.index' , [
            'orders' => Order::all()
        ]);
    }
}
