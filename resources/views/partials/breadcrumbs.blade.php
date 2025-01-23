<div class="section_wrap wrap_breadcrumb_profile">
    <div class="main_center clearfix">
        <ul class="breadcrumb_list">
            <li class="@if(request()->routeIs('orders.*')) active @endif">
                <a href="{!! route('orders.index') !!}">{{translate('my_orders')}}</a>
            </li>
            <li class="@if(request()->routeIs('favorites.*')) active @endif">
                <a href="{!! route('favorites.index') !!}">{{translate('my_favorites')}}</a>
            </li>
            <li class="@if(request()->routeIs('addresses.*')) active @endif">
                <a href="{!! route('addresses.index') !!}">{{translate('my_addresses')}}</a>
            </li>
            <li class="@if(request()->routeIs('settings.*')) active @endif">
                <a href="{!! route('settings.edit') !!}">{{translate('my_information')}}</a>
            </li>
        </ul>

        @auth()
            <form action="{!! route('logout') !!}" method="post">
                @csrf
                <button class="login_btn">{{translate('log_out')}}</button>
            </form>
        @endauth
    </div>
</div>
