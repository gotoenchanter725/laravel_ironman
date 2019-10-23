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
            <div class="col-lg-9 col-md-6 m-auto" >
                <div class="card">
                    <div class="card-header tx-white bg-teal">
                        <h4 class="card-title tx-white">List of Category #{{ $count ?? '' }}</h4>
                        <p class="card-category tx-white">
                            <div class="row">
                                <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
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
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Created by</th>
                                <th>Created At</th>
                                <th class="text-right"> {{ __('Actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($categorys as $category)
                                    <tr>
                                        <td> {{ $categorys->firstItem() + $loop->index }} </td>
                                        <td>
                                            <img class="img-fluid" width="50" src="{{ asset('uploads/category_photos') }}/{{ $category->categoryimage }}" alt="no photo">
                                        </td>
                                        <td> {{ $category->categoryname }} </td>
                                        <td> {{ $category->categorydescription }} </td>
                                        <td> {{ App\User::findOrFail($category->user_id)->name }} </td>
                                        <td> {{ $category->created_at->format('d-M-Y') }} </td>
                                        <td class="td-actions text-right">
                                            <form action=" {{ route('category.destroy', ['category' => $category->id]) }} " method="post">
                                                @csrf 
                                                @method('delete')
                                                <a href="{{ route('category.edit', ['category' => $category->id]) }}" rel="tooltip" class="btn btn-info btn-link btn-sm">
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
                                            <p class="text-center">No Category Found !!!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categorys->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-8 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header tx-white bg-teal">
                        <h4 class="card-title tx-white">List of Deleted Category</h4>
                        <p class="card-category">Deleted category list on {{ $time->format('d-M-Y') }}</p>
                    </div>
                    <div class="card-body table-responsive">
                        @if(session('delete_status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss='alert' aria-label="close">
                                        <i class="fa fa-close">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <table class="table table-hover" id="categoryTable">
                            <thead class="text-primary">
                                <th>#</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Deleted At</th>
                                <th class="text-right"> {{ __('Actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($deleted_categorys as $deleted_category)
                                    <tr>
                                        <td> {{ $loop->index+1 }} </td>
                                        <td>
                                            <img class="img-fluid" width="50" src="{{ asset('uploads/category_photos') }}/{{ $deleted_category->categoryimage }}" alt="no photo">
                                        </td>
                                        <td> {{ $deleted_category->categoryname }} </td>
                                        <td> {{ $deleted_category->categorydescription }} </td>
                                        <td> {{ $deleted_category->deleted_at->format('d-M-Y') }} </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ url('category/delete/'.$deleted_category->id) }}" method="post">
                                                @csrf 
                                                <a href="{{ url('category/restore/'.$deleted_category->id) }}" rel="tooltip" class="btn btn-warning btn-link">
                                                    <i class="fa fa-recycle fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" onclick="confirm('Are you sure want to delete?') ? this.parentElement.submit(): ''">
                                                    <i class="fa fa-trash fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50">
                                            <p class="text-center">No Category Found !!!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categorys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(function(){
      'use strict';

      $('#categoryTable').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
