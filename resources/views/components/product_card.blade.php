<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
    <div class="product product-style-3 equal-elem ">
        <div class="product-thumnail">
            <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" title="{{$product->title}}">
                <figure><img src="{{$product->image}}" alt="{{$product->slug}}"></figure>
            </a>
        </div>
        <div class="product-info">
            <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" class="product-name"><span>{{$product->title}}</span></a>
            <div class="wrap-price"><span class="product-price">
                @if($product->sale > 0 )
                        <span class="product-price"><del>${{$product->price}}</del></span>
                        <span class="product-price" style="color: #ff2832;margin-left:4px">${{$product->priceWithDiscount}}</span>
                @else
                    ${{$product->price}}
                @endif
            </span></div>
            <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" class="btn add-to-cart">Details</a>
        </div>
    </div>
</li>
