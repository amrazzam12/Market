@extends('website.layout.master')

@section('content')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <form action="{{route('order.store')}}" method="post" name="frm-billing">
                @csrf
            <div class=" main-content-area">
                <div class="wrap-address-billing">
                    <h3 class="box-title">Billing Address</h3>

                        <p class="row-in-form">
                            <label for="fname">first name<span>*</span></label>
                            <input id="fname" type="text" name="first_name" value="" placeholder="Your name">
                        </p>
                        <p class="row-in-form">
                            <label for="lname">last name<span>*</span></label>
                            <input id="lname" type="text" name="last_name" value="" placeholder="Your last name">
                        </p>
                        <p class="row-in-form">
                            <label for="email">Email Addreess:</label>
                            <input id="email" type="email" name="email_address" value="" placeholder="Type your email">
                        </p>
                        <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input id="phone" type="number" name="phone_number" value="" placeholder="10 digits format">
                        </p>
                        <p class="row-in-form">
                            <label for="add">Address:</label>
                            <input id="add" type="text" name="address" value="" placeholder="Street at apartment number">
                        </p>
                        <p class="row-in-form">
                            <label for="city">Town / City<span>*</span></label>
                            <input id="city" type="text" name="city" value="" placeholder="City name">
                        </p>

                </div>
                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{$totalPrice}}</span></p>
                        <input value="Place Order" type="submit" class="btn btn-medium" />
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                    </div>
                </div>
                </form>

                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Most Viewed Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            @foreach($mostViewedProducts as $product)
                                 <x-product_cursor_ver :product="$product" :label="'Trending'"></x-product_cursor_ver>
                            @endforeach
                        </div>
                    </div><!--End wrap-products-->
                </div>

            </div><!--end main content area-->
        </div><!--end container-->

    </main>
@endsection
