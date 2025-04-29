<!DOCTYPE html>
<html lang="en">
@include('admin-dashboard.layouts.partials.head')

<body>
<div class="app-wrapper">
    <div class="loader-wrapper">
        <div class="app-loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- Menu Navigation starts -->
    @include('admin-dashboard.layouts.partials.sidebar')
    <!-- Menu Navigation ends -->


    <div class="app-content ">
        <div class="">

            <!-- Header Section starts -->
            @include('admin-dashboard.layouts.partials.header')
            <!-- Header Section ends -->

            <!-- Body main section starts -->
            <main>
                <div class="container-fluid mt-3">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>
    <!-- Body main section ends -->


    <!-- tap on top -->
    <div class="go-top">
      <span class="progress-value">
        <i class="ti ti-chevron-up"></i>
      </span>
    </div>


    <!-- Footer Section starts-->
    @include('admin-dashboard.layouts.partials.footer')
    <!-- Footer Section ends-->
</div>


<!--customizer-->
<div id="customizer"></div>

<script src="{{ asset('dashboard/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/simplebar/simplebar.js') }}"></script>
<script src="{{ asset('dashboard/js/customizer.js') }}"></script>
<script src="{{ asset('dashboard/vendor/phosphor/phosphor.js') }}"></script>
<script src="{{ asset('dashboard/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dashboard/js/script.js') }}"></script>
<script src="{{ asset('dashboard/vendor/filepond/file-encode.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/filepond/validate-size.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/filepond/validate-type.js') }}"></script>
<script src="{{ asset('dashboard/vendor/filepond/exif-orientation.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/filepond/image-preview.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('dashboard/js/project_dashboard.js') }}"></script>
@yield('js-code')
</body>
</html>
