@extends('layouts.dashboard_app', ['activePage' => 'product', 'titlePage' => __('List product')])

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
            <div class="col-lg-9 col-md-9 m-auto" >
                <div class="card">
                    <div class="card-header tx-white bg-teal">
                        <h4 class="card-title tx-white">List of Products #{{ $count ?? '' }}</h4>
                        <p class="card-product tx-white">
                            <div class="row">
                                <a href="{{ route('product.create') }}" class="btn btn-primary">Add New product</a>
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
                                <th>Mark</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Code</th>
                                <th>Product Price</th>
                                <th>Product Stock</th>
                                <th class="text-right"> {{ __('Actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="{{ ($product->product_stock <= $product->alert_quantity) ? 'table-danger':'' }}">
                                        <td> {{ $products->firstItem() + $loop->index }} </td>
                                        <td>
                                            <div class="form-check text-center mx-2">
                                                <input type="checkbox" class="form-check-input" name="mark-deletes[]" value="{{ $product->id }}">
                                            </div>
                                        </td>
                                        <td>
                                            <img class="img-fluid" width="50" src="{{ asset('uploads/product_photos') }}/{{ $product->product_image }}" alt="no photo">
                                        </td>
                                        <td> {{ $product->category->categoryname }} </td>
                                        <td> {{ $product->product_name }} </td>
                                        <td> {{ $product->product_breif_description }} </td>
                                        <td> {{ $product->product_code }} </td>
                                        <td> {{ $product->product_price }} </td>
                                        <td> {{ $product->product_stock }} </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('product.destroy', ['product'=> $product->id]) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <a href="{{ route('product.edit', ['product' => $product->id]) }}" rel="tooltip" class="btn btn-info btn-link btn-sm">
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
                                            <p class="text-center">No product Found !!!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <form id="mark-delete-form" action="{{ route('markdelete')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="mark_deletes[]" id="mark-delete-input" value="">
                                <button id="mark-delete" type="button" class="btn btn-danger" onclick="
                                showMarkArray();
                                confirm('Are you sure want to delete?') ? this.parentElement.parentElement.submit(): ''"
                                >Mark Delete</button>
                            </div>
                        </form>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row mt-2">
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
        </div> --}}
    </div>
</div>
<script>
    // UI Element 
    const markDeleteInput = document.getElementById('mark-delete-input');
    const checkBoxInputAll = document.querySelectorAll('.form-check-input');

    let markDeleteArray = [];
    // Get the value of checkBox
    function showMarkArray() { 
        checkBoxInputAll.forEach(function(item){
            if(item.checked === true){
                //console.log(item.value); 
                // Add value to markDeleteInput 
                markDeleteArray.push(item.value);

                markDeleteInput.value = markDeleteArray;

                // Clear array values
                // markDeleteArray.forEach(function(index){
                //     markDeleteArray.pop()
                // });
            }
            
        });
    }
</script>
@endsection



