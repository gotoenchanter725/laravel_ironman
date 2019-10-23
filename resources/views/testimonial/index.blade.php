@extends('layouts.dashboard_app', ['activePage' => 'testimonial', 'titlePage' => __('List testimonial')])

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
            <div class="col-lg-9 col-md-6 m-auto" >
                <div class="card">
                    <div class="card-header tx-white bg-teal">
                        <h4 class="card-title tx-white">List of Testimonials #{{ $count ?? '' }}</h4>
                        <p class="card-testimonial tx-white">
                            <div class="row">
                                <a href="{{ route('testimonial.create') }}" class="btn btn-primary">Add New Testimonial</a>
                            </div>
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        @if(session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss='alert' aria-label="close">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>#</th>
                                <th>Client Image</th>
                                <th>Client Name</th>
                                <th>Client Message</th>
                                <th>Client Position</th>
                                <th class="text-right"> {{ __('Actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td> {{ $testimonials->firstItem() + $loop->index }} </td>
                                        <td>
                                            <img class="img-fluid" width="50" src="{{ asset('uploads/client_photos') }}/{{ $testimonial->client_image }}" alt="no photo">
                                        </td>
                                        <td> {{ $testimonial->client_name }} </td>
                                        <td> {{ $testimonial->client_message }} </td>
                                        <td> {{ $testimonial->client_position }} </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('testimonial.destroy', ['testimonial'=> $testimonial->id]) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <a href="{{ route('testimonial.edit', ['testimonial' => $testimonial->id]) }}" rel="tooltip" class="btn btn-info btn-link btn-sm">
                                                    <i class="fa fa-pencil fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link btn-sm" onclick="confirm('Are you sure want to delete?') ? this.parentElement.submit(): ''">
                                                    <i class="fa fa-close fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50">
                                            <p class="text-center">No testimonial Found !!!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

