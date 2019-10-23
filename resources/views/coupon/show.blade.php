@extends('layouts.dashboard_app', ['activePage' => 'coupon', 'titlePage' => __('Show coupon')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">coupon</span>
</nav>
@endsection

@section('dashboard_content')

@endsection



