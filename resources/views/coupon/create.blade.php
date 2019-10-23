@extends('layouts.dashboard_app', ['activePage' => 'coupon', 'titlePage' => __('Add Coupon')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Coupon</span>
</nav>
@endsection

@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-teal tx-white">
                        <h4 class="card-title tx-white">Add New Coupon</h4>
                        <p class="card-product tx-white">coupon add form</p>
                    </div>
                    <div class="card-body">
                        @if (session('success_status'))
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert type="success" :message="session('success_status')"/>
                        @endif
                        <form action=" {{ route('coupon.store') }} " method="post" autocomplete="off" autofocus enctype="multipart/form-data">
                            @csrf

                            <x-input-text type="text" labelName="Coupon Name" placeholderName="Enter Coupon Name" varName="coupon_name" dbvalue=""/>

                            <x-input-text type="number" labelName="Discount Amount" placeholderName="Enter Discount Amount" varName="discount_amount" dbvalue=""/>

                            <x-input-text type="number" labelName="Minimum Purchase Amount" placeholderName="Enter Minimum  Purchase Amount" varName="minimum_purchase_amount" dbvalue=""/>

                            <x-input-text type="date" labelName="Validity Till" placeholderName="Enter Coupon validity period" varName="validity_till" dbvalue=""/>
                            
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



