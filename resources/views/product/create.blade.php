@extends('layouts.dashboard_app', ['activePage' => 'product', 'titlePage' => __('Add product')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Product</span>
</nav>
@endsection

@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-teal tx-white">
                        <h4 class="card-title tx-white">Add New Product</h4>
                        <p class="card-product tx-white">product add form</p>
                    </div>
                    <div class="card-body">
                        @if (session('success_status'))
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert type="success" :message="session('success_status')"/>
                        @endif
                        <form action=" {{ route('product.store') }} " method="post" autocomplete="off" autofocus enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="categoryNameSelect">Category Select</label>
                                <select class="form-control" id="categoryNameSelect" name="category_id" >
                                    @foreach ($categories as $category)    
                                    <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-input-text type="text" labelName="Product Name" placeholderName="Enter Product Name" varName="product_name" dbvalue=""/>

                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Product Brief Description")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('product_breif_description') ? 'has-danger': ''}} ">
                                    <textarea name="product_breif_description" id="" rows="5" class="form-control {{ $errors->has('product_breif_description') ? 'is-invalid' : '' }}" placeholder="{{__('Enter Product Description')}}" required=true aria-required="true">{{old('product_breif_description')}} </textarea>
                                    @if($errors->has('product_breif_description'))
                                    <span id="product-name" class="error text-danger" for='input-product_breif_description'>
                                        {{ $errors->first('product_breif_description') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Product Detail Description")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('product_long_description') ? 'has-danger': ''}} ">
                                    <textarea name="product_long_description" id="" rows="5" class="form-control {{ $errors->has('product_long_description') ? 'is-invalid' : '' }}" placeholder="{{__('Enter Product Description')}}" required=true aria-required="true">{{old('product_long_description')}} </textarea>
                                    @if($errors->has('product_long_description'))
                                    <span id="product-name" class="error text-danger" for='input-product_long_description'>
                                        {{ $errors->first('product_long_description') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <x-input-text type="text" labelName="Product Code" placeholderName="Enter Product Code" varName="product_code" dbvalue=""/>
                            <x-input-text type="number" labelName="Product Price" placeholderName="Enter Product Price" varName="product_price" dbvalue=""/>
                            <x-input-text type="number" labelName="Product Stock" placeholderName="Enter Product Stock" varName="product_stock" dbvalue=""/>
                            <x-input-text type="number" labelName="Alert Quantity" placeholderName="Enter alert amount" varName="alert_quantity" dbvalue=""/>
                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Product Thumnail Image")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('product_image') ? 'has-danger': ''}} ">
                                    <input type="file" class="form-control" name="product_image" id="product_image" accept="image/*">
                                    @if($errors->has('product_image'))
                                    <span id="product-name" class="error text-danger" for='input-product_image'>
                                        {{ $errors->first('product_image') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Product Multiple Image")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('product_multiple_image') ? 'has-danger': ''}} ">
                                    <input type="file" name="product_multiple_image[]" id="product_multiple_image" accept="image/*" multiple class="form-control">
                                    @if($errors->has('product_multiple_image'))
                                    <span id="product-multiple-image-name" class="error text-danger" for='input-product_multiple_image'>
                                        {{ $errors->first('product_multiple_image') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Product Additional Information")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('additional_info') ? 'has-danger': ''}} ">
                                    <textarea name="additional_info" id="" rows="5" class="form-control {{ $errors->has('additional_info') ? 'is-invalid' : '' }}" placeholder="{{__('Enter Product Additional Info')}} " required=true aria-required="true">{{old('additional_info')}} </textarea>
                                    @if($errors->has('additional_info'))
                                    <span id="product-name" class="error text-danger" for='input-additional_info'>
                                        {{ $errors->first('additional_info') }}
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



