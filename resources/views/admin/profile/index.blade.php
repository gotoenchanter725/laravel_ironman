@extends('layouts.dashboard_app', ['activePage' => 'userprofile', 'titlePage' => __('User Profile')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">Users Profile</span>
</nav>
@endsection

@section('dashboard_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-teal-love">
                    <h4 class="card-title tx-dark">List of Profiles #{{ $count ?? '' }}</h4>
                    <p class="card-category tx-dark">Lastest user profile List on {{ $time->format('d-M-Y')}}</p>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <ul class="list-group">
                                        <li class="list-group">Date: {{ $user->created_at->format('d-M-Y' ) }}</li>
                                        <li class="list-group">Time: {{ $user->created_at->format('h:i:s A' ) }}</li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
