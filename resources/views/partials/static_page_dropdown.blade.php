@foreach($staticPages as $staticPage)
    <li>
        <a href="{!! route('pages.index', $staticPage) !!}">{{ $staticPage->title[app()->getLocale()] }}</a>
    </li>
@endforeach