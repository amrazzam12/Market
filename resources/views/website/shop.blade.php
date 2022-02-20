@extends('website.layout.master')

@section('content')

    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Products</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{$shopBanner[0]->photo}}" alt=""></figure>
                        </a>
                    </div>



                    <div class="row">

                        <ul class="product-list grid-products equal-container">
                            @foreach($products as $product)
                                <x-product_card :product="$product" > </x-product_card>
                            @endforeach
                        </ul>

                    </div>

                    {{$products->links()}}
                </div><!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                <li class="category-item has-child-cate">
                                    <a href="{{url('shop' . '?category=All')}}" class="cate-link">{{$categories[0]->name}}</a>

                                </li>
                                @foreach($categories as $cat)
                                    @if($loop->iteration == 1) @continue @endif
                                <li class="category-item has-child-cate">
                                    <a href="{{url('shop' . '?category='.$cat->name)}}" class="cate-link">{{$cat->name}}</a>
                                    <span class="toggle-control">+</span>
                                    <ul class="sub-cate">
                                        @foreach($cat->subcategories as $sub_cat)
                                        <li class="category-item"><a href="{{url('shop' . '?category='.$sub_cat->name)}}" class="cate-link">{{$sub_cat->name}} ({{count($sub_cat->subCatProducts)}})</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- Categories widget-->



                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @foreach($hotProducts as $product)
                                    <x-product_cursor_hor :product="$product"></x-product_cursor_hor>
                                @endforeach


                            </ul>
                        </div>
                    </div><!-- brand widget-->

                </div><!--end sitebar-->

            </div><!--end row-->

        </div><!--end container-->

    </main>

@endsection


