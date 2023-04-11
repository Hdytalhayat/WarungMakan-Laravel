@extends('layouts.admin')

@section('title')
    Order List
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>New Orders
                        <a href="{{ 'order-history' }}" class="btn btn-primary btn-sm float-right">history</a>
                    </h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>order Date</th>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-y'. strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>Rp.{{ $item->total_price }}</td>
                                    <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                    <td>
                                        <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">view</a>
                                        
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