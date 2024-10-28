@foreach($products as $product)
	<div class="col item_col clearfix">
		<div class="col_in">
			<div class="fav_sect">
				@auth()
					<span class="favotites @if(!is_null($product->favorites?->where('price_id', $product->price_id)->first())) dofav @endif"
					      data-product-id="{!! $product->id !!}" data-price-id="{!! $product->price_id !!}"></span>
				@else
					<span class="favotites dologin"></span>
				@endauth
			</div>
			<a href="{{route('product', [$product->id, 'price_id' => $product->price_id ])}}">
				<div class="item_img">
					<img src="{{asset('storage/'.$product->image)}}" alt="product">
				</div>
				<div class="item_content">
					<h4 class="itm_title">
						<span class="itm_name card_head">{{$product->name[app()->getLocale()] ?? ''}}</span>
						@if(isset($product->weight))
							<span class="itm_weight">{{$product->weight}} @if($product->weight_type == 0)
									Q
								@else
									Kq
								@endif</span>
						@endif
					</h4>
					<div class="itm_info">{!! $product->category->name[app()->getLocale()] !!}</div>
					<div class="itm_price">

						@if(isset($product->price))
							@if($product->sale_price != 0)
								<span class="new-price">{{$product->sale_price}} AZN</span>
								<span class="old-price">{{$product->price}} AZN</span>
							@else
								<span class="new-price">@if($product->price > 0) {{$product->price}} AZN @else *** @endif</span>
							@endif
						@endif

					</div>
					<!-- <div class="itm_stock stocked">
		                <span class="stock_text">Stokda: 25 ədəd</span>
					</div> -->
					<div class="itm_more">
						Səbətə əlavə et
					</div>
				</div>
			</a>
		</div>
	</div>
@endforeach
