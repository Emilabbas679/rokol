@foreach($products as $product)
	@if($product->prices and isset( $product->prices[0]))
		@php $price = $product->prices[0]; $weight = $price->weight; @endphp
	@else
		@php $price = []; $weight = [] @endphp
	@endif
	<div class="col item_col clearfix">
		<div class="col_in">
			<div class="fav_sect">
				@auth()
					<span class="favotites @if($product->favorite) dofav @endif"
					      data-product-id="{!! $product->id !!}"></span>
				@else
					<span class="favotites dologin"></span>
				@endauth
			</div>
			<a href="{{route('product', $product->id)}}">
				<div href="{{route('product', $product->id)}}" class="item_img">
					<img src="{{asset('storage/'.$product->image)}}" alt="product">
				</div>
				<div class="item_content">
					<h4 class="itm_title">
						<span class="itm_name card_head">{{$product->name[app()->getLocale()] ?? ''}}</span>
						@if(isset($weight['weight']))
							<span class="itm_weight">{{$weight->weight}} @if($weight->weight_type == 0)
									Q
								@else
									Kq
								@endif</span>
						@endif
					</h4>
					<div class="itm_info">{!! $product->category->name[app()->getLocale()] !!}</div>
					<div class="itm_price">

						@if(isset($price['price']))
							@if($price->sale_price != 0)
								<span class="new-price">{{$price->sale_price}} AZN</span>
								<span class="old-price">{{$price->price}} AZN</span>
							@else
								<span class="new-price">{{$price->price}} AZN</span>
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
