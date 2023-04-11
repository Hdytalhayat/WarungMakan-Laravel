@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Dashboard</h1>
                </div>
                <div class="card body">
                    <div class="row mx-3">
                        <div class="col-md-4">
                            <div class="rounded border p-2 mb-2 bg-danger font-weight-bold">Total Categories : {{ $categories }}</div>
                            <div class="rounded border p-2 mb-2 bg-info font-weight-bold">Total menus : {{ $menu }}</div>
                        </div>   
                        <div class="col-md-4">
                            <div class="rounded border p-2 mb-2 bg-primary font-weight-bold">Pending Orders : {{ $pending }}</div>
                            <div class="rounded border p-2 mb-2 bg-success font-weight-bold">Completed Orders : {{ $complete }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="rounded border p-2 mb-2 bg-secondary font-weight-bold">Total User : {{ $users }}</div>
                            @php
                                $avg = number_format($rating_avg)
                            @endphp
                            <div class="rounded border p-2 mb-2 bg-warning font-weight-bold">Rating : {{ $avg }}.0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection