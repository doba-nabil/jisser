<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('dashboardHome') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Jisser</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="fa fa-expand icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class=" fa fa-expand icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc" style="font-size: 13px !important;"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ strpos($url, 'orders') !== false ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}"><i class="fa fa-shopping-bag"></i><span class="menu-title">طلبات الشراء</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'users') !== false ? 'active' : '' }}">
                <a href="{{ route('users.index') }}"><i class="fa fa-user-circle"></i><span class="menu-title">الأعضاء</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'sellers') !== false ? 'active' : '' }}">
                <a href="{{ route('sellers.index') }}"><i class="fa fa-user-circle-o"></i><span class="menu-title">مقدمين الخدمة</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'services') !== false ? 'active' : '' }}">
                <a href="{{ route('services.index') }}"><i class="fa fa-briefcase"></i><span class="menu-title">الخدمات</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'requests') !== false ? 'active' : '' }}">
                <a href="{{ route('requests') }}"><i class="fa fa-tags"></i><span class="menu-title">طلبات الخدمات</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'categories') !== false ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}"><i class="fa fa-archive"></i><span class="menu-title">التصنيفات</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'subcategories') !== false ? 'active' : '' }}">
                <a href="{{ route('subcategories.index') }}"><i class="fa fa-folder"></i><span class="menu-title">التصنيفات الفرعية</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'segments') !== false ? 'active' : '' }}">
                <a href="{{ route('segments.index') }}"><i class="fa fa-sitemap"></i><span class="menu-title">التقسيمات</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'comments') !== false ? 'active' : '' }}">
                <a href="{{ route('comments.index') }}"><i class="fa fa-comments"></i><span class="menu-title">التعليقات</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'countries') !== false ? 'active' : '' }}">
                <a href="{{ route('countries.index') }}"><i class="fa fa-globe"></i><span class="menu-title">الدول</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'cities') !== false ? 'active' : '' }}">
                <a href="{{ route('cities.index') }}"><i class="fa fa-map-signs"></i><span class="menu-title">المدن</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'pages') !== false ? 'active' : '' }}">
                <a href="{{ route('pages.index') }}"><i class="fa fa-file"></i><span class="menu-title">الصفحات</span></a>
            </li>
            <li class="nav-item {{ strpos($url, 'contacts') !== false ? 'active' : '' }}">
                <a href="{{ route('contacts.index') }}"><i class="fa fa-envelope"></i><span class="menu-title">رسائل الزوار</span></a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href=""><i class="fa fa-globe"></i><span class="menu-title">الدول والمدن</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li class="">--}}
{{--                        <a href="{{ route('countries.index') }}"><i class="fa fa-circle"></i><span class="menu-item">كل الدول</span></a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('cities.index') }}"><i class="fa fa-circle"></i><span class="menu-item">كل المدن</span></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
