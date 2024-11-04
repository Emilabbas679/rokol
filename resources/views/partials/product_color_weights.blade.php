<div class="choose_color">
    <div class="pr_select_title">{{translate('choose_color')}}</div>
    <div class="filter_check_items">
        @foreach($colors as $item)
            <label class="f_check_type radio_btn">
                <input type="radio" name="color" @if($price->color_id == $item->color_id) checked @endif value="{{$item->color_id}}">
                <span style="background-color: {{$item->color->hex}};"></span>
            </label>
        @endforeach
        <button class="f_check_type radio_btn color_btn"><span>Kataloqa bax</span></button>
        <div class="modal color_modal" id="new_address_modal" data-id="create_address_modal">
            <div class="modal_section">
                <div class="modal_container">
                    <div class="modal_header">
                        <h5 class="modal_title">Rəng Kataloqu</h5>
                        <span class="close_modal"></span>
                    </div>
                    <div class="modal_body">
                        <div class="row catalog_row_main">
                            <div class="col item_col clearfix">
                                <div class="row catalog_row_inner">
                                    <label class="col item_col clearfix">
                                        <input name="modal_color" type="radio">
                                        <div class="catalog_color" style="background: #ffd500;"></div>
                                        <div class="catalog_name">Limon ana rəng</div>
                                    </label>
                                    <label class="col item_col clearfix">
                                        <input name="modal_color" type="radio">
                                        <div class="catalog_color" style="background: #fff79f;"></div>
                                        <div class="catalog_name">Limon ton 1</div>
                                    </label>
                                    <label class="col item_col clearfix">
                                        <input name="modal_color" type="radio">
                                        <div class="catalog_color" style="background: #fffcb6;"></div>
                                        <div class="catalog_name">Limon ton 2</div>
                                    </label>
                                    <label class="col item_col clearfix">
                                        <input name="modal_color" type="radio">
                                        <div class="catalog_color" style="background: #ffffc7;"></div>
                                        <div class="catalog_name">Limon ton 3</div>
                                    </label>
                                    <label class="col item_col clearfix">
                                        <input name="modal_color" type="radio">
                                        <div class="catalog_color" style="background: #feffda;"></div>
                                        <div class="catalog_name">Limon ton 4</div>
                                    </label>
                                    <label class="col item_col clearfix">
                                        <input name="modal_color" type="radio">
                                        <div class="catalog_color" style="background: #ffffe3;"></div>
                                        <div class="catalog_name">Limon ton 5</div>
                                    </label>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aut placeat, nemo culpa eveniet ducimus? Iure assumenda tempore accusantium numquam optio ratione sit dolorum, libero, cupiditate quam praesentium earum soluta.
                            </p>
                            <div class="btn_detail btn_basket modal_select_btn">
                                <span class="add_basket">
                                    Əlavə et
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="choose_weight">
    <div class="pr_select_title">{{translate('choose_weight')}}</div>
    <div class="filter_check_items">
        @foreach($weights as $item)
            <label class="f_check_type radio_btn">
                <input type="radio" name="weight" value="{{$item->weight_id}}" @if($price->weight_id == $item->weight_id) checked @endif>
                <span>{{$item->weight->weight}} {!! productWeightUnit($item->weight->weight_type) !!}</span>
            </label>
        @endforeach
    </div>
</div>