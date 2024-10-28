@if(isset($price['sale_price']) > 0)
    @if($price->sale_price != 0)
        <span class="new-price">{{$price->sale_price}} AZN</span>
        <span class="old-price">{{$price->price}} AZN</span>
    @else
        <span class="new-price">@if($product->price > 0) {{$product->price}} AZN @else *** @endif</span>
    @endif
@endif