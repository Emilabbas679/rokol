@if($product->has_colors != \App\Models\Product::NO_COLORS)
    <div class="choose_color">
        <div class="pr_select_title">{{translate('choose_color')}}</div>
        <div class="filter_check_items colors">
            @if($product->has_colors == \App\Models\Product::SPEC_COLORS)
                @foreach($product->colors as $item)

                    <label class="f_check_type radio_btn">
                        <input type="radio" name="color" @if($price->color_id == $item->color_id) checked
                               @endif value="{{$item->id}}">
                        <span style="background-color: {{$item->hex}};"></span>
                    </label>
                @endforeach
            @else
                <button class="f_check_type radio_btn color_btn color_open"><span>@lang('Kataloqa bax')</span></button>

                @endif
            </div>
        </div>
        <div class="modal color_modal" id="new_address_modal" data-id="create_address_modal">
            <div class="modal_section">
                <div class="modal_container">
                    <div class="modal_header">
                        <h5 class="modal_title">@lang('Rəng Kataloqu')</h5>
                        <span class="close_modal"></span>
                    </div>
                    <div class="modal_body">
                        <div class="row catalog_row_main">
                            <div class="col item_col clearfix">
                                <div class="row catalog_row_inner">
                                    @foreach(\App\Models\Color::query()->get()->groupBy('code') as $colors)
                                        <label class="col item_col clearfix color_block">
                                            <input name="color" type="checkbox" value="{{ $colors->first()->id }}">
                                            <span style="display:none;"> {{ $colors->first()->hex }}</span>
                                            <div class="catalog_color"
                                                 style="background-color: {{ $colors->first()->hex }};"></div>
                                            <div class="catalog_name">{{ $colors->first()->name[app()->getLocale()] }}</div>
                                        </label>
                                        @foreach($colors as $color)

                                            <label class="col item_col clearfix color_block">
                                                <input name="color" type="checkbox" value="{{ $color->id }}">
                                                <span style="display:none;"> {{ $color->hex }}</span>
                                                <div class="catalog_color"
                                                     style="background-color: {{ $color->hex }};"></div>
                                                <div class="catalog_name">{{ $color->name[app()->getLocale()] }}</div>
                                            </label>
                                        @endforeach

                                    @endforeach
                                </div>
                            </div>
                            <p>
                                Xəbərdarlıq: Elektron cihazlarda (monitor, planşet, telefon və s.) göstərilən rənglər cihazın ekran ayarlarına və ətraf işıqlandırmaya görə fərqlənə bilər. Əsl rəng təsirini qiymətləndirmək üçün ən yaxın satış məntəqəmizdəki rəng nümunələrinə baxmağınız məsləhətdir. Eyni zamanda, seçdiyiniz rəngin  necə göründüyü təbii gün işığı və istifadə olunan işıqlandırma növünə görə dəyişə bilər.
                            </p>
                            <div class="btn_detail btn_basket modal_select_btn color_save">
                            <span class="add_basket">
                                Əlavə et
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
<div class="choose_weight">
    <div class="pr_select_title">{{translate('choose_weight')}}</div>
    <div class="filter_check_items">
        @foreach($product->prices->sort() as $p)
            <label class="f_check_type radio_btn">
                <input type="radio" name="weight" value="{{$p->weight_id}}"
                       @if($price->weight_id == $p->weight_id) checked @endif>
                <span>{{$p->weight->weight}} {!! productWeightUnit($p->weight->weight_type) !!}</span>
            </label>
        @endforeach
    </div>
</div>