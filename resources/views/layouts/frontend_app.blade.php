<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="refresh" content="5; URL=http://127.0.0.1:8000"> --}}
    <title>{{ env('APP_NAME') }} - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Style Start --}}
    @include('frontend.panel.style')
    {{-- Style End --}}
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    @include('frontend.panel.search_form')
    <!-- search-form here -->

    <!-- header-area start -->
    @include('frontend.panel.header')
    <!-- header-area end -->
    @if ($breadCrumb ?? '' == 'true')
        {{-- Breadcrumb Area Start --}}
            @include('frontend.panel.breadcrumb', [$pageName, $pageTitle])
        {{-- Breadcrumb Area End --}}
    @endif

    @yield('frontend_content')

    <!-- start social-newsletter-section -->
    @include('frontend.panel.social_newsletter')
    <!-- end social-newsletter-section -->

    <!-- .footer-area start -->
    @include('frontend.panel.footer')
    <!-- .footer-area end -->

    <!-- Modal area start -->
    @include('frontend.panel.modal')
    <!-- Modal area start -->

    {{-- Script Start --}}
    @include('frontend.panel.script')
    {{-- Script End --}}
</body>
</html>
