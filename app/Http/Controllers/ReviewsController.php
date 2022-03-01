<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
   public function index() {
       return view('admin.reviews.index' , [
           'reviews' => Review::all()
       ]);
   }
}
