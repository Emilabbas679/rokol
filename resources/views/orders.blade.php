@extends('layout')
@section('title', translate('orders'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

	@include('partials.breadcrumbs')
	<div class="section_wrap wrap_category wrap_profile_sect wrap_orders">
		<div class="main_center clearfix">
			<div class="sect_header clearfix">
				<h2 class="sect_title">{{translate('my_orders')}} </h2>
				<div class="order_links">
					<a href="{!! route('orders.index') !!}" class="{!! !request()->filled('status') ? 'active' : '' !!}">{{translate('all')}}</a>
					<a href="{!! route('orders.index', ['status' => \App\Models\ProductOrder::DELIVERED_STATUS_COMPLETED]) !!}" class="{!! activeClassByQueryParam('status', \App\Models\ProductOrder::DELIVERED_STATUS_COMPLETED)  !!}">{{translate('completed')}}</a>
					<a href="{!! route('orders.index', ['status' => \App\Models\ProductOrder::DELIVERED_STATUS_PREPARING]) !!}" class="{!! activeClassByQueryParam('status', \App\Models\ProductOrder::DELIVERED_STATUS_PREPARING)  !!}">{{translate('prepared')}}</a>
					<a href="{!! route('orders.index', ['status' => \App\Models\ProductOrder::DELIVERED_STATUS_CANCELED]) !!}" class="{!! activeClassByQueryParam('status', \App\Models\ProductOrder::DELIVERED_STATUS_CANCELED)  !!}">{{translate('cancelled')}}</a>
				</div>
			</div>
			<div class="sect_body clearfix">
				<div class="row_list clearfix">
					@foreach($orders as $order)
						<div class="order_items">
							<!-- Order Header -->
							<div class="order_header">
								<div class="row">
									<div class="col">
										<div class="row_list">
											<span class="bck_itm_name">{{translate('order_no')}}:</span>
											<span class="bck_itm_val">{!! $order->id !!}</span>
										</div>
										<div class="row_list">
											<span class="bck_itm_name">{{translate('order_date')}}:</span>
											<span class="bck_itm_val">{!! $order->created_at->format('d F Y') !!}</span>
										</div>
									</div>
									<div class="col">
										<div class="row_list">
											<span class="bck_itm_name">{{translate('amount')}}</span>
										</div>
										<div class="row_list">
											<span class="bck_itm_val price">{!! $order->amount !!} AZN</span>
										</div>
									</div>

									@if( $order->delivered_status == \App\Models\ProductOrder::DELIVERED_STATUS_COMPLETED)
										@php
											$txt = translate("complated");
											$class = 'completed'
										@endphp
									@elseif($order->delivered_status == \App\Models\ProductOrder::DELIVERED_STATUS_PREPARING)
										@php
											$txt = translate("preparing");
											$class = 'preparing'
										@endphp
									@else
										@php
											$txt = translate("rejected");
											$class = 'rejected'
										@endphp
									@endif
									<div class="col">
										<span class="order_status {!! $class !!}">
											{!! $txt !!}
										</span>
									</div>
								</div>
							</div>
							@foreach($order->items as $item)
								@if(is_null($item->product))
									@continue
								@endif
								<div class="col_in list_items">
									<a href="{!! route('product', ['product_id' => $item->product->id]) !!}" class="item_img">
										<img src="{{asset('storage/'.$item->product->image)}}"
										     alt="{!! $item->product->name[app()->getLocale()] !!}">
									</a>
									<div class="item_content">
										<div class="list_left_itm">
											<h4 class="itm_title">
												<span class="itm_name">{!! $item->product->name[app()->getLocale()] !!}</span>
												<span class="itm_weight">{!! ($weight = $item->price?->weight)?->weight . " " . productWeightUnit($weight?->weight_type) !!}</span>
											</h4>
											<div class="itm_info">{{ $item->product->category->name[app()->getLocale()] }}</div>
										</div>
										<div class="list_right_itm">
											<div class="itm_price">
												<span class="new-price">{!! $item->price?->price * $item->count !!} AZN</span>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					@endforeach
				</div>
			</div>

		</div>
	</div>
@endsection

@push('js')


@endpush
