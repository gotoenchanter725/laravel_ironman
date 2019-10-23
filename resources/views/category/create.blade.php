@extends('layouts.dashboard_app', ['activePage' => 'category', 'titlePage' => __('Add Category')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Category</span>
</nav>
@endsection
@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-teal tx-white">
                        <h4 class="card-title tx-white">Add New Product Category</h4>
                        <p class="card-category tx-white">product category add form</p>
                    </div>
                    <div class="card-body">
                        @if (session('success_status'))
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert type="success" :message="session('success_status')"/>
                        @endif
                        <form action=" {{ route('category.store') }} " method="post" autocomplete="off" autofocus enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label for="" class="col-sm-12 col-form-label">{{__("Category Name")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('categoryname') ? 'has-danger': ''}} ">
                                    <input type="text" name="categoryname" id="input-categoryname" class="form-control {{ $errors->has('categoryname') ? 'is-invalid': ''}}" placeholder="{{__('Add New Category')}}" required aria-required="true" value="{{old('categoryname')}}">
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
                                    <textarea name="categorydescription" id="" cols="30" rows="10" class="form-control {{ $errors->has('categorydescription') ? 'is-invalid' : '' }}" placeholder="{{__('Enter Category Description')}} " required=true aria-required="true">{{old('categorydescription')}} </textarea>
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

<script>
    $(document).ready( function () {
    $('#categoryTable').DataTable();
} );
</script>