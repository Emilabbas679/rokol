@extends('layout')
@section('title', 'news')
@push('meta')

@endpush

@push('css')

@endpush

@section('content')

<!-- Wrap Category section -->
<div class="section_wrap wrap_news_page">


    <div class="section_wrap news_detail_page">
        <div class="sect_body clearfix">
            <div class="main_center clearfix">
                <div class="detail_container font_scale">
                    <div class="news_inner_items">

                        <div class="news_header clearfix">
                            <h1 class="news_hd">
                                {{ $article->title[app()->getLocale()] }}
                            </h1>
                        </div>
                        <div class="section_body clearfix">

                            <div class="news_in_img">
                                <img src="{{asset('storage/'.$article->image)}}" alt="">
                            </div>
                            <div class="newsin_icons">
                                <!-- <div class="view_count">4562</div> -->
                                <h3 class="stat_catg">{!! $article->created_at->format('d M, Y / H:i') !!}</h3>
                                <div class="text_scale">
                                    <a href="javascript:void(0)" class="scaleminus" id="btn-decrease"></a>
                                    <div class="scalefont text_reset"></div>
                                    <a href="javascript:void(0)" class="scaleplus" id="btn-increase"></a>
                                </div>
                            </div>

                            <div class="nw_in_text clearfix">
                               {!! $article->description['ru'] !!}
                            </div>
                            
{{--                            @dd($article->getMediaCollection('images'))--}}
                            
                            <div class="fancy_gallery clearfix">
                                <div class="row">
                                    @foreach($article->getMedia('images') as  $media)
                                    <div class="col">
                                        <div class="col_in">
                                            <a href="{{$media->getUrl()}}" class="fancy_items" data-fancybox="gallery_offer">
                                                <img src="{{$media->getUrl()}}" alt="item1">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
        
                            <div class="news_in_social clearfix">
                                <div class="nw_social_sect">
                                    <div class="share_name">
                                        PAYLAŞ:
                                    </div>
                                    <ul class="nw_socials">
                                        <li>
                                            <a target="_blank" href="">
                                                <img src="{{asset('img/icons/fb_sh.svg?v2')}}" alt="Facebook">
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="">
                                                <img src="{{asset('img/icons/tlg_sh.svg?v2')}}" alt="Telegram">
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="">
                                                <img src="{{asset('img/icons/msg_sh.svg?v2')}}" alt="Mesenger">
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="">
                                                <img src="{{asset('img/icons/lnk_sh.svg?v2')}}" alt="Linkedn">
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="">
                                                <img src="{{asset('img/icons/wp_sh.svg?v2')}}" alt="Whatsapp">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_wrap wrap_similar_news">
        <div class="main_center clearfix">
            <div class="sect_header clearfix">
                <h2 class="sect_title">
                    <a href="">Oxşar xəbərlər</a>
                </h2>
            </div>
            <div class="sect_body clearfix">
                <div class="row">
                    @foreach($similarArticles as $similarArticle)
                        <div class="col">
                            <div class="col_in">
                                <a href="{!! route('news.show', $article) !!}" target="_blank" title="" class="stat_item_link">
                                    <div class="stat_img">
                                        <img src="{{asset('storage/'.$article->image)}}" alt="{{ $article->title[app()->getLocale()] }}">
                                    </div>
                                    <div class="news_item_content">
                                        <div class="odds_row">
                                            <h3 class="stat_catg">{!! $article->created_at->format('d M, Y / H:i') !!}</h3>
                                        </div>
                                        <div class="odds_row">
                                            <h2 class="stat_title">
                                                {{ $article->title[app()->getLocale()] }}
                                            </h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Wrap Category section -->

@endsection

@push('js')

<script>
  $('.scaleplus').click(function () {
    $('.font_scale *').each(function () {
      if($(this).attr('rfont') === undefined)
        $(this).attr('rfont', $(this).css('font-size'));
      $(this).css('font-size', parseInt($(this).css('font-size')) + 2);
    });
    return false;
  });

  $('.scaleminus').click(function () {
    $('.font_scale *').each(function () {
      if($(this).attr('rfont') === undefined)
        $(this).attr('rfont', $(this).css('font-size'));
      $(this).css('font-size', parseInt($(this).css('font-size')) - 2);
    });
    return false;
  });

  $(".font_scale *").css("font-size", "");
  $(".text_reset").click(function () {
    var article = $(".font_scale *");
    article.css("font-size", "");
  });
</script>


@endpush
