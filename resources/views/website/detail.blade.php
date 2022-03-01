@extends('website.layout.master')


@section('content')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>{{$product->title}}</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="detail-media">
                            <div class="product-gallery">


                                    <li data-thumb="assets/images/products/digital_18.jpg">
                                        <img src="{{asset($product->photo)}}" alt="product thumbnail" />
                                    </li>



                            </div>
                        </div>
                        <div class="detail-info">
                            <div class="star-rating">
                                 <span @if($rating == 1 )class="width-20-percent"
                                     @elseif($rating == 2)class="width-40-percent"
                                     @elseif($rating ==  3)class="width-60-percent"
                                     @elseif($rating == 4)class="width-80-percent"
                                     @elseif($rating == 5) class="width-100-percent"
                                     @endif></span>
                            </div> ({{count($product->reviews) }} Reviews)
                            <h2 class="product-name">{{$product->title}}</h2>
                            <div class="short-desc" style="margin-bottom: 2px;">
                                <ul>
                                    <li>{{$product->slug}}</li>
                                </ul>
                            </div>
                            <div class="wrap-price"><span class="product-price">
                            @if($product->sale > 0)
                                <del>${{$product->price}}</del>
                                <span style="color:#ff2832;margin-left:4px">
                                    ${{$product->priceWithDiscount}}
                                </span>
                            @else
                                <span class="product-price">${{$product->price}}</span>
                            @endif

                            </span></div>
                            <div class="stock-info in-stock">
                                <p class="availability">Availability:
                                @if($product->stock > 0)
                                    <b>In Stock</b>
                                @else
                                    <del><b>Out Of Stock</b></del>
                                @endif
                                </p>
                            </div>
                            <form action="{{route('addToCart' , $product->id)}}" method="post">
                                @csrf
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    <div class="quantity-input">
                                        <input type="hidden" name="image" value="{{$product->image}}">
                                        <input type="hidden" name="name" value="{{$product->title}}">
                                        <input type="hidden" name="price" value="{{$product->priceWithDiscount}}">
                                        <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
                                        <a class="btn btn-reduce" href="#"></a>
                                        <a class="btn btn-increase" href="#"></a>
                                    </div>
                                </div>
                                <div class="wrap-butons">
                                     <a href="#" class="btn add-to-cart"><input type="submit" value="Add to Cart" style="background: none;border: none"></a>
                                </div>
                            </form>
                                <div class="wrap-butons">

                                    <div class="wrap-btn">
                                        <form action="{{route('addToWishList')}}" method="POST">
                                            @csrf
                                            @auth
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            @endauth
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button class="btn btn-wishlist" style="background: none" type="submit">Add Wishlist</button>
                                        </form>
                                    </div>
                                </div>

                            </form>




                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">description</a>
                                <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                                <a href="#review" class="tab-control-item">Reviews</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    <p>{{$product->desc}}</p>
                                </div>
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                        <tr>
                                            <th>Weight</th><td class="product_weight">{{$product->weight}} kg</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-content-item " id="review">
                                    @forelse($product->reviews as $review)
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{$review->user->name}}</span></h2>
                                            <ol class="commentlist">
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <img alt="" src="{{$review->user->image}}" height="80" width="80">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span @if($review->rating == 1)class="width-20-percent"
                                                                      @elseif($review->rating == 2) class="width-40-percent"
                                                                      @elseif($review->rating == 3) class="width-60-percent"
                                                                      @elseif($review->rating == 4) class="width-80-percent"
                                                                      @elseif($review->rating == 5) class="width-100-percent"
                                                                    @endif>Rated <strong class="rating">{{$review->rating}}</strong> out of 5</span>
                                                            </div>
                                                            <p class="meta">

                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$review->created_at->diffForHumans()}}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$review->comment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div><!-- #comments -->
                                    @empty
                                        No Comments
                                    @endforelse
                                    <div class="wrap-review-form">
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                @auth
                                                    <form action="{{route('review.store')}}" method="post" id="commentform" class="comment-form">
                                                        @csrf
                                                        <div class="comment-form-rating">
                                                            <span>Your rating</span>
                                                            <p class="stars">
                                                                <label for="rated-1"></label>
                                                                <input type="radio" id="rated-1" name="rating" value="1">
                                                                <label for="rated-2"></label>
                                                                <input type="radio" id="rated-2" name="rating" value="2">
                                                                <label for="rated-3"></label>
                                                                <input type="radio" id="rated-3" name="rating" value="3">
                                                                <label for="rated-4"></label>
                                                                <input type="radio" id="rated-4" name="rating" value="4">
                                                                <label for="rated-5"></label>
                                                                <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                            </p>
                                                        </div>
                                                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                        <p class="comment-form-comment">
                                                            <label for="comment">Your review <span class="required">*</span>
                                                            </label>
                                                            <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                        </p>

                                                        <p class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="btn btn-primary" value="Comment">
                                                        </p>

                                                    </form>
                                                   @endauth
                                                    @guest <a href="{{route('login')}}">Login To Leave A Comment</a> @endguest


                                                </div><!-- .comment-respond-->
                                            </div><!-- #review_form -->
                                        </div><!-- #review_form_wrapper -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Free Shipping</b>
                                            <span class="subtitle">On Oder Over $99</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Special Offer</b>
                                            <span class="subtitle">Get a gift!</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Order Return</b>
                                            <span class="subtitle">Return within 7 days</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @foreach($popularProducts as $product)
                                    <x-product_cursor_hor :product="$product"></x-product_cursor_hor>

                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div><!--end sitebar-->

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Related Products</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                                @foreach($relatedProducts as $product)
                                    <x-product_cursor_ver :product="$product" :label="'Related'"></x-product_cursor_ver>

                                @endforeach

                            </div>
                        </div><!--End wrap-products-->
                    </div>
                </div>

            </div><!--end row-->

        </div><!--end container-->

    </main>

@endsection
