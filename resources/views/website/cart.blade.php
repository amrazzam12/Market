@extends('website.layout.master')

@section('content')

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Cart</span></li>
                </ul>
            </div>
            <div class=" main-content-area">

                <div class="wrap-iten-in-cart">
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @if($cartProducts != null)
                        @foreach($cartProducts as $key => $item)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{$cartProducts[$key]['image']}}" alt=""></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="#">{{$cartProducts[$key]['product_name']}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$cartProducts[$key]['price']}}</p></div>
                            <div class="quantity">
                                <div class="btn btn-danger">
                                    <p>{{$cartProducts[$key]['quantity']}}</p>
                                </div>
                            </div>
                            <div class="price-field sub-total"><p class="price">${{$cartProducts[$key]['totalPrice']}}</p></div>
                            <div class="delete">
                                <a href="#" class="btn btn-delete" title="">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>

                        @endforeach
                        @else
                            <li class="pr-cart-item">

                                <div class="product-name">
                                    <a class="link-to-product" href="#">No Products Yet</a>
                                </div>

                            </li>
                        @endif
                    </ul>
                </div>

                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">
                            ${{$totalPrice}}
                        </b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">$50</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{$totalPrice + 50}}</b></p>
                    </div>
                    <div class="checkout-info">
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                        </label>
                        <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                        <a class="link-to-shop" href="shop.blade.php">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="{{route('cart.delete')}}">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>

                <div class="wrap-show-advance-info-box style-1">
                    <h3 class="title-box">Hot Products</h3>

                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="digital_1a">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                        @foreach($popularProducts as $product)
                                            <x-product_cursor_ver :product="$product" :label="'hot'"> </x-product_cursor_ver>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end main content area-->
        </div><!--end container-->

    </main>

@endsection
