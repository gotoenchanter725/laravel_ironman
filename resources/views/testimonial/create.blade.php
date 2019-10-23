@extends('layouts.dashboard_app', ['activePage' => 'testimonial', 'titlePage' => __('Add testimonial')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Testimonial</span>
</nav>
@endsection

@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-teal tx-white">
                        <h4 class="card-title tx-white">Add New Testimonial</h4>
                        <p class="card-product tx-white">Testimonial add form</p>
                    </div>
                    <div class="card-body">
                        @if (session('success_status'))
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert type="success" :message="session('success_status')"/>
                        @endif
                        <form action=" {{ route('testimonial.store') }} " method="post" autocomplete="off" autofocus enctype="multipart/form-data">
                            @csrf

                            <x-input-text type="text" labelName="Client Name" placeholderName="Enter Client Name" varName="client_name" dbvalue=""/>

                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Client Message")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('client_message') ? 'has-danger': ''}} ">
                                    <textarea name="client_message" id="" rows="5" class="form-control {{ $errors->has('client_message') ? 'is-invalid' : '' }}" placeholder="{{__('Enter Your Message')}}" required=true aria-required="true">{{old('client_message')}} </textarea>
                                    @if($errors->has('client_message'))
                                    <span id="product-name" class="error text-danger" for='input-client_message'>
                                        {{ $errors->first('client_message') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <x-input-text type="text" labelName="Client Position" placeholderName="Enter Client Position with Company Name" varName="client_position" dbvalue=""/>

                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Client Image")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('client_image') ? 'has-danger': ''}} ">
                                    <input type="file" name="client_image" id="client_image" accept="image/*">
                                    @if($errors->has('client_image'))
                                    <span id="client-image" class="error text-danger" for='input-client_image'>
                                        {{ $errors->first('client_image') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

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

