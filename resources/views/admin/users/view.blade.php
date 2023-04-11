@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>User Details
                        <a href="{{ url('users-list') }}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">{{ $users->role_as == '0'?'Customer':'Admin' }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">First Name</label>
                            <div class="p-2 border">{{ $users->name }}</div>
                        </div> 
                        <div class="col-md-4 mt-3">
                            <label for="">Last Name</label>
                            <div class="p-2 border">{{ $users->last_name }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{ $users->email }}</div>

                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Phone Number</label>
                            <div class="p-2 border">{{ $users->phone }}</div>

                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Address</label>
                            <div class="p-2 border">{{ $users->address }}</div>

                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">District/City</label>
                            <div class="p-2 border">{{ $users->city }}</div>

                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Province</label>
                            <div class="p-2 border">{{ $users->province }}</div>

                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Postal Code</label>
                            <div class="p-2">{{ $users->postal }}</div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection