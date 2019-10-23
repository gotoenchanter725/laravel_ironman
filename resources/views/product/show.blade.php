@extends('layouts.dashboard_app', ['activePage' => 'product', 'titlePage' => __('Show product')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Product</span>
</nav>
@endsection

@section('dashboard_content')

@endsection



