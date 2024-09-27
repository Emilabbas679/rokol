<div class="choose_color">
    <div class="pr_select_title">{{translate('choose_color')}}</div>
    <div class="filter_check_items">
        @foreach($colors as $item)
            <label class="f_check_type radio_btn">
                <input type="radio" name="color" @if($price->color_id == $item->color_id) checked @endif value="{{$item->color_id}}">
                <span style="background-color: {{$item->color->hex}};"></span>
            </label>
        @endforeach

    </div>
</div>
<div class="choose_weight">
    <div class="pr_select_title">{{translate('choose_weight')}}</div>
    <div class="filter_check_items">
        @foreach($weights as $item)
            <label class="f_check_type radio_btn">
                <input type="radio" name="weight" value="{{$item->weight_id}}" @if($price->weight_id == $item->weight_id) checked @endif>
                <span>{{$item->weight->weight}} @if($item->weight->weight_type == 1) Kq @else Q @endif</span>
            </label>
        @endforeach
    </div>
</div>