@if($colorGroupsCount = $product->colorGroups->count())
    <div class="choose_color">
        <div class="pr_select_title">{{translate('choose_color')}}</div>
        <div class="filter_check_items colors">
                <?php
                $colors = collect();
                foreach ( $product->colorGroups->first()->colors as $color ) {
                    $colors->add( $color );
                    if ( $color->children->count() ) {
                        foreach ( $color->children as $child ) {
                            $colors->add( $child );
                        }
                    }
                }
                ?>
            @if($colors->count() <= 6 )
                @foreach($colors as $color)
                    <label class="f_check_type radio_btn">
                        <input type="radio" name="color" @if($price->color_id == $color->id) checked
                               @endif value="{{$color->id}}">
                        <span style="background-color: {{$color->hex}};"></span>
                    </label>
                @endforeach
            @else
                <button class="f_check_type radio_btn color_btn color_open select_color">
                    <span>@lang('Kataloqa bax')</span></button>

            @endif
        </div>
    </div>
    @if($colors->count() > 6)
        <div class="modal color_modal" id="new_address_modal" data-id="create_address_modal">
            <div class="modal_section">
                <div class="modal_container">
                    <div class="modal_header">
                        <h5 class="modal_title">{{translate('color_catalog')}}</h5>
                        <span class="close_modal"></span>
                    </div>
                    <div class="modal_body">
                        <div class="row catalog_row_main">
                            <div class="col item_col clearfix">
                                <div class="row catalog_row_inner">
                                    @foreach($colors as $color)
                                        <label class="col item_col clearfix color_block">
                                            <input name="color" type="checkbox" value="{{ $color->id }}">
                                            <span style="display:none;"> {{ $color->hex }}</span>
                                            <div class="catalog_color"
                                                 style="background-color: {{ $color->hex }};"></div>
                                            <div class="catalog_name">{{ $color->name[app()->getLocale()] }}</div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <p>
                                {{translate('warning_text')}}
                            </p>
                            <div class="btn_detail btn_basket modal_select_btn color_save">
                            <span class="add_basket">
                                {{translate('add')}}
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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