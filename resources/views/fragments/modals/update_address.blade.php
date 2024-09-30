<div class="modal" id="update_address_modal">
    <div class="modal_section">
        <div class="modal_container">
            <div class="modal_header">
                <h5 class="modal_title">@lang('Ünvanı yenilə')</h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">
                <form method="post" class="create_address_form" id="update_address_form">
                    @method('PUT')
                    <input type="hidden" name="id" id="address-id">
                    <div class="row">
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="first-name-update">@lang('Ad')</label>
                                <input type="text" id="first-name-update" name="first_name" placeholder="@lang('Ad')" class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="last-name-update">@lang('Soyad')</label>
                                <input type="text" id="last-name-update" name="last_name" placeholder="@lang('Soyad')" class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="phone-update">@lang('Telefon')</label>
                                <input type="text" id="phone-update" name="phone" placeholder="@lang('Telefon')" class="item_input phone">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="city-update">@lang('Şəhər/Rayon')</label>
                                <input type="text" id="city-update" name="city" placeholder="@lang('Şəhər/Rayon')"
                                       class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>

                    </div>
                    <div class="form_item ">
                        <label class="itm_inp_label" for="address-update">@lang('Ünvan')</label>
                        <input type="text" id="address-update" name="address" placeholder="@lang('Ünvan')" class="item_input">
                        <!-- <div class="error_type">Supporting text</div> -->
                    </div>
                    <div class="security_content">
                        @lang('Yükünüzün problemsiz sizə çatması üçün məhəllə, küçə, küçə və bina kimi ətraflı məlumatları mütləq daxil edin.')
                    </div>
                    <div class="form_item ">
                        <label class="itm_inp_label" for="title-update">@lang('Ünvan başlığı')</label>
                        <input type="text" id="title-update" name="title" placeholder="@lang('Ünvan başlığı')" class="item_input">
                        <!-- <div class="error_type">Supporting text</div> -->
                    </div>
                    <button type="submit" class="btn_sign submit_btn update_address">@lang('Yadda saxla')</button>

                </form>
            </div>
        </div>
    </div>
</div>
