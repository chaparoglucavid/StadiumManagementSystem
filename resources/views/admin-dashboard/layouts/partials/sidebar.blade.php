<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="index.html">
            <img alt="#" src="{{ asset('dashboard/images/logo/1.png') }}">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
      <i class="ti ti-chevrons-right f-s-20"></i>
    </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
            <li class="menu-title">
                <span>İdarə paneli</span>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-home-alt"></i> Əsas səhifə
                </a>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#users">
                    <i class="iconoir-group"></i>
                    İstifadəçilər
                </a>
                <ul class="collapse" id="users">
                    <li><a href="index.html">İstifadəçilər</a></li>
                    <li><a href="ecommerce_dashboard.html">Vendorlar</a></li>
                </ul>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-home-alt"></i> Meydançalar
                </a>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-book-stack"></i> Rezervasiyalar
                </a>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('admin.admin-dashboard') }}">
                    <i class="iconoir-money-square"></i> Ödəniş tarixçəsi
                </a>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#settings">
                    <i class="iconoir-database-settings"></i>
                    Tənzimləmələr
                </a>
                <ul class="collapse" id="settings">
                    <li><a href="index.html">Ümumi tənzimləmələr</a></li>
                    <li><a href="{{ route('admin.features.index') }}">Meydança özəllikləri</a></li>
                    <li><a href="index.html">İdman növləri</a></li>
                    <li><a href="index.html">Meydança növləri</a></li>
                    <li><a href="index.html">Meydança örtük növləri</a></li>
                    <li><a href="index.html">Ödəniş tənzimləmələri</a></li>
                    <li><a href="ecommerce_dashboard.html">Sistem haqqında</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
