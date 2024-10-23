<li class="desk_show cart_icon">
    <a href="{!! route('favorites.index') !!}"
       class="shop_icon icon_fav  @auth() dologin @endauth"></a>
    @if($favoritesCount)
        <span class="favorite_count">
            {!! $favoritesCount !!}
        </span>
    @endif
</li>