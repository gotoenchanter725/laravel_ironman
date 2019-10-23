@extends('layouts.dashboard_app', ['activePage' => 'blogpost', 'titlePage' => __('Edit blogpost')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">BlogPost</span>
</nav>
@endsection
@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-teal tx-white">
                        <h4 class="card-title tx-white">Edit blog post</h4>
                        <p class="card-category tx-white">blogpost edit form</p>
                    </div>
                    <div class="card-body">
                        @if (session('success_status'))
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert type="success" :message="session('success_status')"/>
                        @endif
                        <form action=" {{ route('posts.update', $post) }} " method="post" autocomplete="off" autofocus enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label for="" class="col-sm-12 col-form-label">{{__("BlogPost Title")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('title') ? 'has-danger': ''}} ">
                                    <input type="text" name="title" id="input-title" class="form-control {{ $errors->has('title') ? 'is-invalid': ''}}" placeholder="{{__('Add Post Title')}}" required aria-required="true" value="{{old('title', $post->title)}}">
                                    @if($errors->has('title'))
                                    <span id="category-name" class="error text-danger" for='input-title'>
                                        {{ $errors->first('title') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("BlogPost Message/Content")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('content') ? 'has-danger': ''}} ">
                                    <textarea name="content" id="" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="{{__('Enter Post Message/Content')}} " required=true aria-required="true">{{old('content', $post->content)}} </textarea>
                                    @if($errors->has('content'))
                                    <span id="category-name" class="error text-danger" for='input-content'>
                                        {{ $errors->first('content') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-12 col-form-label">{{__("Post Image")}} </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('post_image') ? 'has-danger': ''}} ">
                                    <input type="file" name="post_image" id="post_image" accept="image/*">
                                    @if($errors->has('post_image'))
                                    <span id="category-name" class="error text-danger" for='input-post_image'>
                                        {{ $errors->first('post_image') }}
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


