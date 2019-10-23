@extends('layouts.dashboard_app', ['activePage' => 'contact', 'titlePage' => __('Edit Contact')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ route('contact.index') }}">Contact</a>
    <span class="breadcrumb-item active">Edit Contact</span>
</nav>
@endsection

@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="card-title tx-white">Edit New Contact</h4>
                        <p class="card-category tx-white">contact edit form</p>
                    </div>
                    <div class="card-body">
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert :type="session('type')" :message="session('form-status')"/>
                            <form action=" {{ route('contact.update', ['contact' => $contact->id]) }} " method="post" autocomplete="off" autofocus>
                            @csrf
                            @method('PUT')
                            <x-input-text type="text" labelName="First Name" placeholderName="Enter first name" varName="firstname" :dbvalue="$contact->firstname"/>
                            <x-input-text type="text" labelName="Last Name" placeholderName="Enter last name" varName="lastname" :dbvalue="$contact->lastname"/>
                            <x-input-text type="email" labelName="Email Address" placeholderName="Enter Email Address" varName="email_address" :dbvalue="$contact->email_address"/>
                            <x-input-text type="text" labelName="Mobile Number" placeholderName="Enter mobile number" varName="mobile_number" :dbvalue="$contact->mobile_number"/>
                            <x-input-text type="text" labelName="City" placeholderName="Enter city name" varName="city" :dbvalue="$contact->city"/>
                            <div class="card-footer">
                                <button class="btn btn-warning" type="submit"> {{ __('Update') }} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection