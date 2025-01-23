@extends('layout')
@section('title', translate('checkout_address'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

	<!-- Wrap Category section -->
	<div class="section_wrap wrap_address_page">
		<div class="main_center clearfix">
			<div class="sect_body clearfix">


				<div class="wrap_left">
					<div class="adrs_container">
                    @if($errors->any() && app()->environment('local'))
                        @foreach($errors->all() as $error)
                            <div class="address_error">{!! $error !!}</div>
                        @endforeach
                    @endif
						<form action="{!! route('carts.complete') !!}" method="post" id="checkout_address_form">
							@csrf
							<div class="cr_adr_row">
								<label class="address_label select_label">
									<input type="radio" name="select_address" checked value="office">
									<span class="label_disk"></span>
									<span class="address_title">{{translate('transfer_title')}}</span>
									<span class="address_info">{{translate('transfer_info')}}
									</span>
								</label>
							</div>
							<div class="cr_adr_row {{ old('select_address') == 'address' ? 'select_label' : '' }}">
								<label class="address_label">
									<input type="radio" name="select_address" {{ old('select_address') == 'address' ? 'checked' : '' }} value="address">
									<span class="label_disk"></span>
									<span class="address_title">{{translate('address')}}</span>
									<span class="address_info">{{translate('address_select')}}</span>
								</label>
								<div class="my_adress_sect">
									@foreach($addresses ?? [] as $address)
										<div class="my_adress_item" id="my_address_{!! $loop->index !!}">
											<input name="address_id" class="address-btn" type="radio"
                                                   {!! old('address_id') == $address->id ? 'checked' : ''  !!}
											       style="display: none" value="{!! $address->id !!}">
											<div class="my_adress_content">
												<div class="my_adrs_title">{!! $address->title !!}</div>
												<div class="my_adrs_info">{!! $address->full_name !!}</div>
												<div class="my_adrs_info">{!! $address->phone !!}</div>
												<div class="my_adrs_info">{!! $address->address !!}</div>
												<div class="my_adrs_info">{!! $address->city !!}</div>
											</div>
											<div class="bsk_icons">
												<span class="edit"
												      onclick="showUpdateAddressModal({!! $address->id !!})"></span>
											</div>
										</div>
									@endforeach

									<button type="button" class="filter_btn btn_create btn_create_address">
										<span>{{translate('create_new_address')}}</span>
									</button>

								</div>
							</div>

						</form>
					</div>
				</div>
				<div class="wrap_right">
					<div class="basket_info_sect">
						<ul class="basket_info_list">
							<li>{{translate('basket_list_1')}}</li>
							<li>{{translate('basket_list_2')}}</li>
							<li>{{translate('basket_list_3')}}</li>
						</ul>
						<div class="basket_items_table">

							<!-- Endirim varsa "discount_price",  cemi ise bu class "total_price"  -->
							<div class="bsk_itm_row">
								<div class="bsk_itm_name">{{translate('price')}}:</div>
								<div
										class="bsk_itm_val">
									{!! $totalPrice = $carts->sum(fn ($cart) => $cart->productPrice->price * $cart->count) !!}
									AZN
								</div>
							</div>
							<div class="bsk_itm_row discount_price">
								<div class="bsk_itm_name">{{translate('discount')}}:</div>
								<div class="bsk_itm_val">
									{!! $totalPrice - ( $totalPriceWithDiscount = $carts->sum(fn ($cart) => $cart->productPrice->sale_price > 0 ? $cart->productPrice->sale_price * $cart->count : $cart->productPrice->price * $cart->count ) ) !!}
									AZN
								</div>
							</div>
                            @if(\App\Models\ProductOrder::DELIVERY_PRICE > 0)
                                <div class="bsk_itm_row">
                                    <div class="bsk_itm_name">{{translate('delivery')}}:</div>
                                    <div class="bsk_itm_val">{!! \App\Models\ProductOrder::DELIVERY_PRICE !!}AZN
                                    </div>
                                </div>
                            @endif
							<div class="bsk_itm_row total_price">
								<div class="bsk_itm_name">{{translate('paid')}}:</div>
								<div class="bsk_itm_val">{!! $totalPriceWithDiscount + \App\Models\ProductOrder::DELIVERY_PRICE !!}
									AZN
								</div>
							</div>
							<button type="submit" class="filter_btn btn_send"
							        form="checkout_address_form">{{translate('purchase')}}</button>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Wrap Category section -->


	<!-- Modal Section -->
    <div class="modal" id="new_address_modal" data-id="create_address_modal">
        <div class="modal_section">
            <div class="modal_container">
                <div class="modal_header">
                    <h5 class="modal_title">{{translate('create_new_address')}}</h5>
                    <span class="close_modal"></span>
                </div>
                <div class="modal_body">
                    <form action="{!! route('addresses.store') !!}" method="post" class="create_address_form" id="address_form">
                        <div class="row">
                            <div class="col">
                                <div class="form_item ">
                                    <label class="itm_inp_label" for="first-name">{{translate('name')}}</label>
                                    <input type="text" id="first-name" name="first_name" placeholder="{{translate('name')}}" class="item_input">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="form_item ">
                                    <label class="itm_inp_label" for="last-name">{{translate('surname')}}</label>
                                    <input type="text" id="last-name" name="last_name" placeholder="{{translate('surname')}}" class="item_input">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="form_item ">
                                    <label class="itm_inp_label" for="phone">{{translate('phone')}}</label>
                                    <input type="text" id="phone" name="phone" placeholder="{{translate('phone')}}" class="item_input phone">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="form_item ">
                                    <label class="itm_inp_label" for="city">{{translate('city')}}</label>
                                    <input type="text" id="city" name="city" placeholder="{{translate('city')}}"
                                           class="item_input">
                                    <!-- <div class="error_type">Supporting text</div> -->
                                </div>
                            </div>

                        </div>
                        <div class="form_item ">
                            <label class="itm_inp_label" for="address">{{translate('address')}}</label>
                            <input type="text" id="address" name="address" placeholder="{{translate('address')}}" class="item_input">
                            <!-- <div class="error_type">Supporting text</div> -->
                        </div>
                        <div class="security_content">
                            {{translate('security_content')}}
                        </div>
                        <div class="form_item ">
                            <label class="itm_inp_label" for="title">{{translate('address_head')}}</label>
                            <input type="text" id="title" name="title" placeholder="{{translate('address_head')}}" class="item_input">
                            <!-- <div class="error_type">Supporting text</div> -->
                        </div>
                        <button type="submit" class="btn_sign submit_btn submit_address">{{translate('remember')}}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- Modal Section -->

	@include('fragments.modals.update_address')

@endsection

@push('js')
	<script>
        $(document).ready(function () {
            $(".phone").inputmask({
                "mask": "+(999) 99 999 99 99",
            });
        });
	</script>
	<script>
        $('.btn_create_address').click(function (e) {
            $("#new_address_modal").addClass("opened");
        });
	</script>

	<script>
        $('.address_label').click(function () {
            $(this).parents(".adrs_container").find(".cr_adr_row").removeClass("select_label");
            $(this).parents(".cr_adr_row").addClass("select_label");
            @if(old('address_id'))
                $(this).siblings(".my_adress_sect").find("#my_address_{{ old('address_id') }}").addClass("select_my_address");
            @endif
        });

        $('.cr_adr_row').click(function () {
            var firstAddressItem = $(this).find('.my_adress_item').first();
            if (firstAddressItem.length > 0) { 
                $(this).find('.my_adress_item').removeClass("select_my_address");
                firstAddressItem.addClass("select_my_address");
                firstAddressItem.find('input[type="radio"]').prop('checked', true);
            }
        });

        $('.my_adress_item').click(function (event) {
            event.stopPropagation(); 
            $(this).siblings().removeClass("select_my_address");
            $(this).addClass("select_my_address");
            $(this).find('input[type="radio"]').prop('checked', true);
        });

	</script>
	<script>
        $(document).ready(function () {
            $(".edit").click(function (e) {
                $(this).toggleClass("doedit");
            });
        });
	</script>
	<script>
        $(function () {
            $('.submit_address').on('click', function (e) {
                e.preventDefault();
                let data = $('#address_form').serialize();
                $.ajax({
                    url: "{!! route('addresses.store') !!}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        Accept: 'application/json; charset=utf-8'
                    },
                    data,
                    dataType: 'JSON',
                    success: function (data) {
                        // console.log(data);
                        window.location.href = "{!! route('carts.address', request()->all()) !!}";
                        // $(`<div class="my_adress_item" id="my_address">
						// 					<input name="address_id" class="address-btn" type="radio"
						// 					       style="display: none" value="${data.id}">
						// 					<div class="my_adress_content">
						// 						<div class="my_adrs_title">${data.title}</div>
						// 						<div class="my_adrs_info">${data.first_name} ${data.last_name}</div>
						// 						<div class="my_adrs_info">${data.phone}</div>
						// 						<div class="my_adrs_info">${data.address}</div>
						// 						<div class="my_adrs_info">${data.city}</div>
						// 					</div>
						// 					<div class="bsk_icons">
						// 						<span class="edit"
						// 						      onclick="showUpdateAddressModal(${data.id})"></span>
						// 					</div>
						// 				</div>`).insertBefore('.btn_create_address');
                        // $("#new_address_modal").removeClass("opened");
                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, (key, value) => {
                            $(`<div class="error_type">${value[0]}</div>`).insertAfter(`input[name=${key}]`);
                        })
                    },
                });

            })
            $('.update_address').on('click', function (e) {
                e.preventDefault();
                let data = $('#update_address_form').serialize();
                let id = $('#address-id').val();
                $.ajax({
                    url: "{!! url('/addresses') !!}/" + id,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        Accept: 'application/json; charset=utf-8'
                    },
                    data,
                    dataType: 'JSON',
                    success: function (data) {
                        window.location.href = "{!! route('carts.address') !!}";
                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, (key, value) => {
                            $(`<div class="error_type">${value[0]}</div>`).insertAfter(`input[name=${key}]`);
                        })
                    },
                })

            });
        });
	</script>
	<script>

        function showUpdateAddressModal(id) {
            $.ajax({
                url: "{!! url('/addresses') !!}/" + id,
                method: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $.each(data, (key, value) => {
                        $('#' + key.replace('_', '-').concat('-update')).val(value);
                    });
                    $("#update_address_modal").addClass("opened");
                    $('#address-id').val(`${id}`);
                }
            })
        }
	</script>
@endpush
