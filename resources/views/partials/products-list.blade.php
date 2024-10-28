@foreach($products as $product)
	<div class="col_in list_items">
		<a href="{!! route('product', $product) !!}" class="item_img">
			<img
					src="{!! asset('storage/'.$product->image) !!}"
					alt="{{ $product->name[app()->getLocale()] }}">
		</a>
		<div class="item_content">

			<div class="list_left_itm">
				<h4 class="itm_title">
					<span class="itm_name">{{ $product->name[app()->getLocale()] }}</span>
					<span class="itm_weight">{{ $product->weight }} {{ $product->weight_type == 1 ? 'Kq' : 'q' }}</span>
				</h4>
				<div class="itm_info">{{ $product->category->name[app()->getLocale()] }}</div>
			</div>
			<div class="list_right_itm">
				<div class="itm_price">

					<span class="new-price">@if($product->price > 0) {{$product->price}} AZN @else *** @endif</span>
					@if($product->sale_price > 0)
						<span class="old-price">{{ $product->sale_price }} AZN</span>
					@endif
				</div>
				<div class="itm_more_sect">
					<div class="itm_more">
						Səbətə əlavə et
					</div>
{{--					<div class="itm_stock stocked">--}}
{{--						<span class="stock_text">Stokda: 25 ədəd</span>--}}
{{--					</div>--}}
				</div>

				<div class="fav_sect">
					@auth()
						<span class="favotites @if(!is_null($product->favorites?->where('price_id', $product->price_id)->first())) dofav @endif"
							  data-product-id="{!! $product->id !!}" data-price-id="{!! $product->price_id !!}"></span>
					@else
						<span class="favotites dologin"></span>
					@endauth
				</div>
			</div>
		</div>
	</div>
@endforeach