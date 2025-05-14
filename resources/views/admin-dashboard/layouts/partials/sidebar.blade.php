<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ route('admin.admin-dashboard') }}">
            <img alt="#" src="{{ asset('dashboard/images/logo/1.png') }}">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
      <i class="ti ti-chevrons-right f-s-20"></i>
    </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
            <li class="menu-title">
                <span>{{ t('admin dashboard') }}</span>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-home-alt"></i> {{ t('homepage') }}
                </a>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#users">
                    <i class="iconoir-group"></i>
                    {{ t('users') }}
                </a>
                <ul class="collapse" id="users">
                    <li><a href="{{ route('admin.users.index') }}">{{ t('customers') }}</a></li>
                    <li><a href="#">{{ t('vendors') }}</a></li>
                </ul>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-home-alt"></i> {{ t('stadiums') }}
                </a>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-book-stack"></i> {{ t('reservations') }}
                </a>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-money-square"></i> {{ t('payment_history') }}
                </a>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#settings">
                    <i class="iconoir-database-settings"></i>
                    {{ t('settings') }}
                </a>
                <ul class="collapse" id="settings">
                    <li><a href="index.html">{{ t('general settings') }}</a></li>
                    <li><a href="{{ route('admin.cities.index') }}">{{ t('cities') }}</a></li>
                    <li><a href="{{ route('admin.regions.index') }}">{{ t('regions') }}</a></li>
                    <li><a href="{{ route('admin.languages.index') }}">{{ t('languages') }}</a></li>
                    <li><a href="{{ route('admin.features.index') }}">{{ t('features') }}</a></li>
                    <li><a href="{{ route('admin.sport-types.index') }}">{{ t('sport types') }}</a></li>
                    <li><a href="{{ route('admin.stadium-types.index') }}">{{ t('stadium types') }}</a></li>
                    <li><a href="{{ route('admin.playground-surface-types.index') }}">{{ t('playground surface types') }}</a></li>
                    <li><a href="{{ route('admin.vendor-packages.index') }}">{{ t('vendor packages') }}</a></li>
                    <li><a href="ecommerce_dashboard.html">{{ t('about system') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
