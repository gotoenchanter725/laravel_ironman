@extends('layouts.dashboard_app', ['activePage' => 'coupon', 'titlePage' => __('Edit coupon')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">coupon</span>
</nav>
@endsection

@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-teal tx-white">
                        <h4 class="card-title tx-white">Edit Coupon Form</h4>
                        <p class="card-coupon tx-white">coupon edit form</p>
                    </div>
                    <div class="card-body">
                        @if (session('success_status'))
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert type="success" :message="session('success_status')"/>
                        @endif
                        <form action=" {{ route('coupon.update', $coupon) }} " method="post" autocomplete="off" autofocus enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input-text type="text" labelName="Coupon Name" placeholderName="Enter Coupon Name" varName="coupon_name" :dbvalue="$coupon->coupon_name"/>

                            <x-input-text type="number" labelName="Discount Amount" placeholderName="Enter Discount Amount" varName="discount_amount" :dbvalue="$coupon->discount_amount"/>

                            <x-input-text type="number" labelName="Minimum Purchase Amount" placeholderName="Enter Minimum  Purchase Amount" varName="minimum_purchase_amount" :dbvalue="$coupon->minimum_purchase_amount"/>

                            <x-input-text type="date" labelName="Validity Till" placeholderName="Enter Coupon validity period" varName="validity_till" :dbvalue="$coupon->validity_till"/>

                            <div class="card-footer bg-gray-400">
                                <button class="btn btn-success" type="submit"> {{ __('Save') }} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

