@include('frontend.partials.header')
@include('frontend.partials.navbar-variant.navbar-'.get_static_option('navbar_variant'))
{{-- @include('frontend.user.dashboard.haed') --}}
@include('frontend.partials.breadcrumb')
@yield('content')
@include('frontend.partials.footer')
