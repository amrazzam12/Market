<div class="product product-style-2 equal-elem ">
    <div class="product-thumnail">
        <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}">
            <figure><img src="{{asset($product->image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
        </a>
        <div class="group-flash">
            <span class="flash-item sale-label">{{$label}}</span>
        </div>
        <div class="wrap-btn">
            <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" class="function-link">quick view</a>
        </div>
    </div>
    <div class="product-info">
        <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" class="product-name"><span>{{$product->title}}</span></a>
        <div class="wrap-price">
            @if($product->sale > 0)
                <span class="product-price"><del>${{$product->price}}</del></span>
                <span class="product-price" style="color: #ff2832;margin-left:4px">${{$product->priceWithDiscount}}</span>
            @else
                <span class="product-price">${{$product->price}}</span>
            @endif
        </div>
    </div>
</div>
