@extends('layouts.dashboard_app', ['activePage' => 'home', 'titlePage' => __('DashBoard')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Dashboard</span>
</nav>
@endsection

@section('dashboard_content')
<div class="col-lg-12 col-md-12 m-auto" >
    <div class="card">
        <div class="card-header tx-white bg-teal">
            <h4 class="card-title tx-white">List of Orders #{{ $count ?? '' }}</h4>
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
                    <th>View Details</th>
                    <th>order date</th>
                    <th>payment method</th>
                    <th>payment status</th>
                    <th>sub total</th>
                    <th>discount</th>
                    <th>total</th>
                    <th>Download Invoice</th>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td> {{ $loop->index+1 }} </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal{{ $order->id }}">Order Details</button>
                                <div class="modal fade" id="modal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $order->id }}Title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="#modal{{ $order->id }}Title">Order Number #{{ $order->id }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-inverse table-responsive">
                                                            <thead class="thead-inverse">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Product Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Unit Price</th>
                                                                    <th>Sub total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($order->orderDetails as $item)    
                                                                    <tr>
                                                                        <td>{{ $loop->index+1 }}</td>
                                                                        <td>{{ $item->product->product_name}}</td>
                                                                        <td>{{ $item->product_quantity }}</td>
                                                                        <td>{{ $item->product->product_price }}</td>
                                                                        <td>{{ $item->product_price }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td colspan="4">
                                                                            Total Payable Amount:
                                                                        </td>
                                                                        <td><strong> ${{ $order->total }}</strong></td>
                                                                    </tr>
                                                                    <tr class="mt-3">
                                                                        <td colspan="50">
                                                                            Billing Address: 
                                                                            <p>Recipent Name: {{ $order->billing->name }}</p>
                                                                            <p>Mobile Number: {{ $order->billing->phone_number}}</p>
                                                                            <p>Address: {{ $order->billing->address }}</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="mt-3">
                                                                        <td colspan="50">Shipping Address: 
                                                                            <p>Recipent Name: {{ $order->shipping->name }}</p>
                                                                            <p>Mobile Number: {{ $order->shipping->phone_number}}</p>
                                                                            <p>Address: {{ $order->shipping->address }}</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->paymentMethod->payment_name }}</td>
                            <td>
                                @if ($order->payment_status == 1)
                                <span class="badge badge-warning">unpaid</span>
                                @elseif($order->payment_status == 2)
                                <span class="badge badge-success">paid</span>
                                @else
                                <span class="badge badge-danger">cancel</span>
                                @endif
                            </td>                 
                            <td>{{ $order->sub_total }}</td>
                            <td>{{ $order->discount_amount }}({{ $order->coupon_name }})</td>
                            <td>{{ $order->total }}</td>
                            <td><a href="{{ route('invoice.download', $order->id) }}"><i class="fa fa-download"></i>Download Invoice</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="50">
                                <p class="text-center">No order Found !!!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
