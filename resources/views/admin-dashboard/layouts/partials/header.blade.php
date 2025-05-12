<header class="header-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-sm-4 d-flex align-items-center header-left p-0">
               <span class="header-toggle me-3">
                 <i class="iconoir-view-grid"></i>
               </span>
            </div>

            <div class="col-6 col-sm-8 d-flex align-items-center justify-content-end header-right p-0">
                <ul class="d-flex align-items-center">
                    <li>{{ app()->getLocale() }}</li>
                    <li class="header-language">
                        <div class="flex-shrink-0 dropdown" id="lang_selector">
                            <a aria-expanded="false" class="d-block head-icon ps-0" data-bs-toggle="dropdown" href="#">
                                <div class="lang-flag lang-en ">
                                  <span class="flag rounded-circle overflow-hidden">
                                    <img src="{{ asset('dashboard/images/logo/'.app()->getLocale().'.png') }}" height="25">
                                  </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu language-dropdown header-card border-0" style="">
                                @foreach($system_languages as $language)
                                    <li class="lang lang-en selected dropdown-item p-2 language_href_js" data-lang="{{ $language->shortened }}" data-bs-placement="top"
                                        data-bs-toggle="tooltip" title="US">
                                      <span class="d-flex align-items-center">
                                        <img src="{{ asset('dashboard/images/logo/'.app()->getLocale().'.png') }}" height="25">
                                        <span class="ps-2">{{ $language->getTranslation('name', app()->getLocale()) }}</span>
                                      </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>
                    <li class="header-dark">
                        <div class="sun-logo head-icon">
                            <i class="iconoir-sun-light"></i>
                        </div>
                        <div class="moon-logo head-icon">
                            <i class="iconoir-half-moon"></i>
                        </div>
                    </li>

                    <li class="header-profile">
                        <a aria-controls="profilecanvasRight" class="d-block head-icon"
                           data-bs-target="#profilecanvasRight" data-bs-toggle="offcanvas"
                           href="#" role="button">
                            <img alt="avtar" class="b-r-50 h-35 w-35 bg-dark"
                                 src="{{ asset('dashboard/images/avtar/woman.jpg') }}">
                        </a>

                        <div aria-labelledby="profilecanvasRight"
                             class="offcanvas offcanvas-end header-profile-canvas"
                             id="profilecanvasRight"
                             tabindex="-1">
                            <div class="offcanvas-body app-scroll">
                                <ul class="">
                                    <li class="d-flex gap-3 mb-3">
                                        <div class="d-flex-center">
                                        <span class="h-45 w-45 d-flex-center b-r-10 position-relative">
                                          <img alt="" class="img-fluid b-r-10"
                                               src="{{ asset('dashboard/images/avtar/woman.jpg') }}">
                                        </span>
                                        </div>
                                        <div class="text-center mt-2">
                                            <h6 class="mb-0"> {{ Auth::user()->name.' '.Auth::user()->surname }} <img
                                                    alt="instagram-check-mark"
                                                    class="w-20 h-20"
                                                    src="{{ asset('dashboard/images/profile-app/01.png') }}"></h6>
                                            <p class="f-s-12 mb-0 text-secondary">{{ Auth::user()->email }}</p>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="f-w-500" href="profile.html" target="_blank">
                                            <i class="iconoir-user-love pe-1 f-s-20"></i> Hesab məlumatları
                                        </a>
                                    </li>
                                    <li>
                                        <a class="f-w-500" href="setting.html" target="_blank">
                                            <i class="iconoir-settings pe-1 f-s-20"></i> Ümumi tənzimləmələr
                                        </a>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a class="f-w-500" href="#">
                                                <i class="iconoir-bell-notification pe-1 f-s-20"></i>
                                                Bildirişlər
                                            </a>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="f-w-500" href="pricing.html" target="_blank">
                                            <i class="iconoir-dollar pe-1 f-s-20"></i>
                                            Qiymət paketləri
                                        </a>
                                    </li>
                                    <li>
                                        <a class="mb-0 text-secondary f-w-500" href="sign_up.html"
                                           target="_blank">
                                            <i class="iconoir-plus pe-1 f-s-20"></i> Yeni admin əlavə et
                                        </a>
                                    </li>
                                    <li class="app-divider-v dotted py-1"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button
                                                class="w-100 mb-0 btn btn-light-danger btn-sm justify-content-center">
                                                <span>
                                                    <i class="ph-duotone  ph-sign-out pe-1 f-s-20"></i>
                                                </span>
                                                Çıxış
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
