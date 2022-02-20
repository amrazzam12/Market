@extends('website.layout.master')
@section('content')
	<main id="main">
		<div class="container">

			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                    @if(count($mainBanners) > 0)
                    @foreach($mainBanners as $banner)
					<div class="item-slide">
						<img src="{{$banner->photo}}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title" style="font-weight: bold;color: #FF2832">{{$banner->title}}</b></h2>
							<span class="subtitle" style="font-size: 20px;font-weight: bold">{{$banner->slug}}</span>
							<p class="sale-info mt-2 mb-2" style="font-size: 24px;color: #FF2832">{{$banner->desc}}</p>
							<a href="{{url('shop')}}" class="btn-link">Shop Now</a>
						</div>
					</div>
                    @endforeach @else
                        No Banners
                    @endif
				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
                @if(count($banners) > 0)
                @foreach($banners as $banner)
				<div class="banner-item">
					<a href="{{url('shop')}}" class="link-banner banner-effect-1">
						<figure><img src="{{$banner->photo}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
                @endforeach @else
                    No Banners
                @endif

			</div>

			<!--On Sale-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @if(count($saleProducts) > 0)
                        @foreach($saleProducts as $product)
                           <x-product_cursor_ver :product="$product" :label="'sale'"></x-product_cursor_ver>
                        @endforeach @else
                            No Products In Sale
                    @endif


				</div>
			</div>
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
                        @if(count($latestProductsBanner) > 0)
						<figure><img src="{{$latestProductsBanner[0]->photo}}" width="1170" height="240" alt=""></figure>
                        @endif
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @if(count($latestProducts) > 0)
                                        @foreach($latestProducts as $product)
                                            <x-product_cursor_ver :product="$product" :label="'new'"></x-product_cursor_ver>
                                        @endforeach @else
                                        No Latest Products
                                    @endif


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Hot Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Hot Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
                        @if(count($hotProductsBanner) > 0)
						    <figure><img src="{{$hotProductsBanner[0]->photo}}" width="1170" height="240" alt=""></figure>
                        @endif
					</a>
				</div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @if(count($hotProducts) > 0)
                                        @foreach($hotProducts as $product)
                                            <x-product_cursor_ver :product="$product" :label="'hot'"></x-product_cursor_ver>
                                        @endforeach
                                    @else
                                            No Hot Products
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>

		</div>

	</main>
@endsection

