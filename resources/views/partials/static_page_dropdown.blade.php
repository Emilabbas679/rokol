@php
    if (isset($underNews) && $underNews){
        $staticPages = $staticPages->where('under_news', true)->all();
    } else {
        $staticPages = $staticPages->where('under_news', false)->all();
    }
@endphp
@foreach($staticPages as $staticPage)
    <li>
        <a href="{!! route('pages.index', $staticPage) !!}">{{ $staticPage->title[app()->getLocale()] }}</a>
    </li>
@endforeach