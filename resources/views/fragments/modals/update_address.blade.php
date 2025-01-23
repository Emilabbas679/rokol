<div class="modal" id="update_address_modal">
    <div class="modal_section">
        <div class="modal_container">
            <div class="modal_header">
                <h5 class="modal_title">{{translate('update_address')}}</h5>
                <span class="close_modal"></span>
            </div>
            <div class="modal_body">
                <form method="post" class="create_address_form" id="update_address_form">
                    @method('PUT')
                    <input type="hidden" name="id" id="address-id">
                    <div class="row">
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="first-name-update">{{translate('name')}}</label>
                                <input type="text" id="first-name-update" name="first_name" placeholder="{{translate('name')}}" class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="last-name-update">{{translate('surname')}}</label>
                                <input type="text" id="last-name-update" name="last_name" placeholder="{{translate('surname')}}" class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="phone-update">{{translate('phone')}}</label>
                                <input type="text" id="phone-update" name="phone" placeholder="{{translate('phone')}}" class="item_input phone">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_item ">
                                <label class="itm_inp_label" for="city-update">{{translate('city')}}</label>
                                <input type="text" id="city-update" name="city" placeholder="{{translate('city')}}"
                                       class="item_input">
                                <!-- <div class="error_type">Supporting text</div> -->
                            </div>
                        </div>

                    </div>
                    <div class="form_item ">
                        <label class="itm_inp_label" for="address-update">{{translate('address')}}</label>
                        <input type="text" id="address-update" name="address" placeholder="{{translate('address')}}" class="item_input">
                        <!-- <div class="error_type">Supporting text</div> -->
                    </div>
                    <div class="security_content">
                    {{translate('security_content')}}
                    </div>
                    <div class="form_item ">
                        <label class="itm_inp_label" for="title-update">{{translate('address_head')}}</label>
                        <input type="text" id="title-update" name="title" placeholder="{{translate('address_head')}}" class="item_input">
                        <!-- <div class="error_type">Supporting text</div> -->
                    </div>
                    <button type="submit" class="btn_sign submit_btn update_address">{{translate('remember')}}</button>

                </form>
            </div>
        </div>
    </div>
</div>
