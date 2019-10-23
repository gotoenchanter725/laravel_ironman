@extends('layouts.dashboard_app', ['activePage' => 'contact', 'titlePage' => __('Add Contact')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Contact</span>
</nav>
@endsection

@section('dashboard_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h4 class="card-title tx-white">List of Contact #{{ $count ?? '' }}</h4>
                        <p class="card-category tx-white">Lastest Contact List on {{ $time->format('d-M-Y') }}</p>
                    </div>
                    <div class="card-body table-responsive">
                        {{-- @if(session('status'))
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
                        @endif --}}
                        <x-alert :type="session('type')" :message="session('list-status')"/>
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Phone/Mobile</th>
                                <th>City</th>
                                <th class="text-right"> {{ __('Actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td> {{ $contacts->firstItem() + $loop->index }} </td>
                                        <td> {{ $contact->firstname }} {{ $contact->lastname }} </td>
                                        <td> {{ $contact->email_address }} </td>
                                        <td> {{ $contact->mobile_number }} </td>
                                        <td> {{ $contact->city }} </td>
                                        <td class="td-actions text-right">
                                            <form action=" {{ route('contact.destroy', ['contact' => $contact->id]) }} " method="post">
                                                @csrf 
                                                @method('delete')
                                                <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}" rel="tooltip" class="btn btn-info btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link btn-sm" onclick="confirm('Are you sure want to delete?') ? this.parentElement.submit(): ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50">
                                            <p class="text-center">No Contact Found !!!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h4 class="card-title tx-white">Add New Contact</h4>
                        <p class="card-category tx-white">contact add form</p>
                    </div>
                    <div class="card-body">
                            {{-- Laravel 7 Components Features  --}}
                            <x-alert :type="session('type')" :message="session('form-status')"/>
                        <form action=" {{ route('contact.store') }} " method="post" autocomplete="off" autofocus>
                            @csrf
                            <x-input-text type="text" labelName="First Name" placeholderName="Enter first name" varName="firstname" dbvalue=""/>
                            <x-input-text type="text" labelName="Last Name" placeholderName="Enter last name" varName="lastname" dbvalue=""/>
                            <x-input-text type="email" labelName="Email Address" placeholderName="Enter Email Address" varName="email_address" dbvalue=""/>
                            <x-input-text type="text" labelName="Mobile Number" placeholderName="Enter mobile number" varName="mobile_number" dbvalue=""/>
                            <x-input-text type="text" labelName="City" placeholderName="Enter city name" varName="city" dbvalue=""/>
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit"> {{ __('Save') }} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h4 class="card-title tx-white">List of Deleted Contact #{{ $deleted_count ?? '' }}</h4>
                        <p class="card-category tx-white">Lastest deleted contact list on {{ $time->format('d-M-Y') }}
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        {{-- @if(session('status'))
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
                        @endif --}}
                        <x-alert :type="session('type')" :message="session('delete-list-status')"/>
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Phone/Mobile</th>
                                <th>City</th>
                                <th class="text-right"> {{ __('Actions') }}</th>
                            </thead>
                            <tbody>
                                @forelse ($deleted_contacts as $deleted_contact)
                                    <tr>
                                        <td> {{ $loop->index+1 }} </td>
                                        <td> {{ $deleted_contact->firstname }} {{ $deleted_contact->lastname }} </td>
                                        <td> {{ $deleted_contact->email_address }} </td>
                                        <td> {{ $deleted_contact->mobile_number }} </td>
                                        <td> {{ $deleted_contact->city }} </td>
                                        <td class="td-actions text-right">
                                            <form class="form-delete"  action=" {{ route('contact.forcedelete',$deleted_contact->id) }} " method="post">
                                                @csrf 
                                                <a href="{{ route('contact.restore', $deleted_contact->id) }}" rel="tooltip" class="btn btn-warning btn-link btn-sm">
                                                    <i class="material-icons">restore</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link btn-sm btn-delete">
                                                    <i class="material-icons">delete</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50">
                                            <p class="text-center">No Contact Found !!!</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection