@extends('layouts.admin')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Order view
                            <a class="btn btn-primary btn-sm float-right" href="{{ url('orders') }}">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h6>Shipping Detail</h6>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->first_name }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->last_name }}</div>
                            </div>
                            <div class="col-md-6">
                                <h6>Order Detail</h6>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->Orderitem as $item)
                                            <tr>
                                                <td>{{ $item->menu->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>Rp.{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/menu/'.$item->menu->image) }}" width="50px" alt="Sevice image..">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total : <span class="float-end">Rp.{{ $orders->total_price }}</span> </h4>
                                <div class="mt-5 px-2">
                                    <label for="">Order Status</label>
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="order-status" id="" class="form-select">
                                            <option value="0" {{ $orders->status == '0' ? 'selected':'' }}>Pending</option>
                                            <option value="1" {{ $orders->status == '1' ? 'selected':'' }}>Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection