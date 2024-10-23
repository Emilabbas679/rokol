<li class="cart_icon">
    <a href="{!! route('carts.index') !!}" class="shop_icon icon_backet">
        @if($cartsCount)
            <span class="cart_count">
                {!! $cartsCount !!}
            </span>
        @endif
    </a>
</li>