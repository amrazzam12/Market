@extends('website.layout.master')

@section('content')

    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>WithList</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <div class="wrap-iten-in-cart">
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @if(count($wishlist) > 0)

                        @foreach($wishlist as $item)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{$item->item['image']}}" alt=""></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="#">{{$item->item['title']}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$item->item['price']}}</p></div>
                            <div class="delete">
                                <a href="{{route('wishlist.delete' , $item->id)}}">
                                    <span>Remove</span>
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
