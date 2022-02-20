<li class="product-item">
    <div class="product product-widget-style">
        <div class="thumbnnail">
            <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                <figure><img src="{{asset($product->image)}}" alt=""></figure>
            </a>
        </div>
        <div class="product-info">
            <a href="{{url('shop/' . $product->id . '?related=' . $product->subcat_id)}}" class="product-name"><span>{{$product->title}}</span></a>

            @if($product->sale > 0)
                <span class="product-price"><del>${{$product->price}}</del></span>
                <span class="product-price" style="color: #ff2832;margin-left:4px">${{$product->priceWithDiscount}}</span>
            @else
                <span class="product-price">${{$product->price}}</span>
            @endif
        </div>
    </div>
</li>
