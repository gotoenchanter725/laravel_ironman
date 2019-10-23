@extends('layouts.dashboard_app', ['activePage' => 'category', 'titlePage' => __('Edit Category')])
@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ route('category.index') }}">Category</a>
    <span class="breadcrumb-item active">Edit Category</span>
</nav>
@endsection
@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 m-auto">
                <div class="card">
                    <div class="card-header tx-white bg-warning">
                        <h4 class="card-title tx-white">Edit Product Category</h4>
                        <p class="card-category">product category edit form</p>
                    </div>
                    <div class="card-body">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Add Category</a></li>
                            <li class="breadcrumb-item active">{{ $category->categoryname }}</li>
                        </ol>
                        @if(session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss='alert' aria-label="close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <form action=" {{ route('category.update', ['category' => $category->id]) }} " method="post" autocomplete="off" autofocus>
                            @csrf
                            @method('put')
                            <div class="row">
                                <label for="" class="col-sm-12 col-form-label">{{__("Category Name")}} </label>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group {{ $errors->has('categoryname') ? 'has-danger': ''}} ">
                                    <input type="text" name="categoryname" id="input-categoryname" class="form-control {{ $errors->has('categoryname') ? 'is-invalid': ''}}" placeholder=" {{__('Add New Category')}} " required aria-required="true" value="{{ old('categoryname', $category->categoryname ?? null) }}">
                                    @if($errors->has('categoryname'))
                                    <span id="category-name" class="error text-danger" for='input-categoryname'>
                                        {{ $errors->first('categoryname') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Category Description")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('categorydescription') ? 'has-danger': ''}} ">
                                    <textarea name="categorydescription" id="" cols="30" rows="10" class="form-control {{ $errors->has('categorydescription') ? 'is-invalid' : '' }} " placeholder=" {{ __('Enter Category Description') }} " required=true aria-required="true">{{old('categorydescription',$category->categorydescription ?? null)}}</textarea>
                                    @if($errors->has('categorydescription'))
                                    <span id="category-name" class="error text-danger" for='input-categorydescription'>
                                        {{ $errors->first('categorydescription') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Category Image")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('categoryimage') ? 'has-danger': ''}} ">
                                    <input type="file" name="categoryimage" id="categoryImage" accept="image/*">
                                    @if($errors->has('categoryimage'))
                                    <span id="category-name" class="error text-danger" for='input-categoryimage'>
                                        {{ $errors->first('categoryimage') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer bg-gray-400">
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