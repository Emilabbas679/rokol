@extends('layout')
@section('title', translate('addresses'))
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

    <!-- Wrap Category section -->
    <!-- Breadcrumb -->
    @include('partials.breadcrumbs')
    <!-- Breadcrumb -->

    <div class="section_wrap wrap_address_page my_address">
        <div class="main_center clearfix">
            <div class="sect_body clearfix">

                <div class="adrs_container ">
                    <div class="sect_header clearfix">
                        <h2 class="sect_title">{{translate('my_adresses')}} </h2>
                        <button type="button" class="filter_btn btn_create btn_create_address">
                            <span>{{translate('create_new_address')}}</span></button>
                    </div>
                    <div class="my_adress_sect">
                        @foreach($addresses ?? [] as $address)
                            <div class="my_adress_item" id="my_address_1">
                                <div class="my_adress_content">
                                    <div class="my_adrs_title">{!! $address->title !!}</div>
                                    <div class="my_adrs_info">{!! $address->full_name !!}</div>
                                    <div class="my_adrs_info">{!! $address->phone !!}</div>
                                    <div class="my_adrs_info">{!! $address->address !!}</div>
                                    <div class="my_adrs_info">{!! $address->city !!}</div>
                                </div>
                                <div class="bsk_icons">
                                    <form action="{!! route('addresses.destroy', $address) !!}" method="post" onsubmit="return confirm('@lang("Are you sure?")')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="delete"></button>
                                    </form>
                                    <span class="edit" onclick="showUpdateAddressModal({!! $address->id !!})"></span>
                                </div>
                            </div>
                        @endforeach

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

    <!-- Modal Section -->
    @include('fragments.modals.update_address')
    <!-- Modal Section -->

    <!-- Response Modal -->
    @if (session('status'))
    <div class="modal opened" data-id="message_modal">
        <div class="modal_section">
            <div class="modal_container">
                <div class="modal_header">
                    <span class="close_modal"></span>
                </div>
                <div class="modal_body">

                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Response Modal -->

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
            e.preventDefault();
            e.stopPropagation();
            $("#new_address_modal").addClass("opened");
        });
    </script>

    <script>
        $('.address_label').click(function () {
            $(this).parents(".adrs_container").find(".cr_adr_row").removeClass("select_label");
            $(this).parents(".cr_adr_row").addClass("select_label");
            $(this).siblings(".my_adress_sect").find(".my_adress_item").removeClass("select_my_address");
            $(this).siblings(".my_adress_sect").find("#my_address_1").addClass("select_my_address");
        });

        $('.my_adress_item').click(function () {
            $(this).siblings().removeClass("select_my_address");
            $(this).addClass("select_my_address");
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".edit").click(function (e) {
                $(this).toggleClass("doedit");
            });
            $(".delete").click(function () {
                $(this).toggleClass("dodel");
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
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data,
                    success: function (data) {
                        window.location.href = "{!! route('addresses.index') !!}";
                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, (key, value) => {
                            $(`<div class="error_type">${value[0]}</div>`).insertAfter(`input[name=${key}]`);
                        })
                    },
                })

            })
            $('.update_address').on('click', function (e) {
                e.preventDefault();
                let data = $('#update_address_form').serialize();
                let id = $('#address-id').val();
                $.ajax({
                    url: "{!! url('/addresses') !!}/"+id,
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data,
                    success: function (data) {
                        window.location.href = "{!! route('addresses.index') !!}";
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
                url: "{!! url('/addresses') !!}/"+id,
                method: 'GET',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'JSON',
                success: function (data) {
                    $.each(data, (key, value) => {
                        $('#'+key.replace('_', '-').concat('-update')).val(value);
                    });
                    $("#update_address_modal").addClass("opened");
                    $('#address-id').val(`${id}`);
                }
            })
        }
    </script>
@endpush
