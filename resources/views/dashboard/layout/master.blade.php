<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    @include('dashboard.layout.head')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static menu-collapsed"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<input type="hidden" value="{{ URL::to('/') }}" id="base_url">

<!-- BEGIN: Header-->
@include('dashboard.layout.header')
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@include('dashboard.layout.navbar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            @section('dashboard-main')

            @show
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- BEGIN: Footer-->
@include('dashboard.layout.footer')
<!-- END: Footer-->
</body>
</html>
