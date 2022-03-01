@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="btn btn-success w-100 mb-5" style="height: 200px; line-height: 170px;font-size: 30px">
                {{$countOfUsers}} User
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="btn btn-danger w-100 mb-5" style="height: 200px; line-height: 170px;font-size: 30px">
                {{$countOfCategories}} Category
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="btn btn-primary w-100 mb-5" style="height: 200px; line-height: 170px;font-size: 30px">
                {{$countOfProducts}} Product
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="btn btn-dark w-100 mb-5" style="height: 200px; line-height: 170px;font-size: 30px">
                {{$countOfReviews}} Review
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="btn btn-success w-100 mb-5" style="height: 200px; line-height: 170px;font-size: 30px">
                {{$countOfOrders}} Orders
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="btn btn-danger w-100 mb-5" style="height: 200px; line-height: 170px;font-size: 30px">
                {{$countOfBanners}} Banner
            </div>
        </div>
    </div>
@endsection
