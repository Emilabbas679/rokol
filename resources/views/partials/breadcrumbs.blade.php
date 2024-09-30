<div class="section_wrap wrap_breadcrumb_profile">
    <div class="main_center clearfix">
        <ul class="breadcrumb_list">
            <li class="@if(request()->routeIs('orders.*')) active @endif">
                <a href="{!! route('orders.index') !!}">@lang('Sifarişlərim')</a>
            </li>
            <li class="@if(request()->routeIs('favorites.*')) active @endif">
                <a href="{!! route('favorites.index') !!}">@lang('Seçilmişlərim')</a>
            </li>
            <li class="@if(request()->routeIs('addresses.*')) active @endif">
                <a href="{!! route('addresses.index') !!}">@lang('Ünvanlarım')</a>
            </li>
            <li class="@if(request()->routeIs('settings.*')) active @endif">
                <a href="{!! route('settings.edit') !!}">@lang('Şəxsi məlumatlarım')</a>
            </li>
        </ul>

        @auth()
            <form action="{!! route('logout') !!}" method="post">
                @csrf
                <button class="login_btn">@lang('Çıxış et')</button>
            </form>
        @endauth
    </div>
</div>
