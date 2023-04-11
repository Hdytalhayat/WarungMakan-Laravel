@extends('layouts.frontend')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-secondary border-top">
        <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> / 
            <a href="{{ url('cart') }}">
                Cart
            </a> /
            <a href="{{ url('checkout') }}">
                Checkout
            </a>
        </h6>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{ url('order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card mb-5">
                        <div class="card-body">
                            <h6>Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input value="{{ Auth::user()->name }}" name="fname" type="text" class="form-control fname" placeholder="Enter First Name" required>
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input value="{{ Auth::user()->last_name }}" name="lname" type="text" class="form-control lname" placeholder="Enter Last Name" required>
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            
                            @if ($cart_item->count() >0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name menu</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart_item as $item)
                                        
                                        <tr>
                                            <td>{{ $item->menu->name }}</td>
                                            <td>{{ $item->menu_qty }}</td>
                                            {{-- <td>Rp.{{ $item->menu->menu_price*$item->menu_qty }}</td> --}}
                                            @if ($item->menu_price == NULL)
                                            <td>Rp.{{ $item->menu->original_price*$item->menu_qty }}</td>
                                            @else
                                            <td>Rp.{{ $item->menu->menu_price*$item->menu_qty }}</td>
                                            @endif
                                        </tr>
                                        @php
                                        if ($item->menu_price == NULL){
                                            $total +=  $item->menu->original_price * $item->menu_qty ;
                                        }
                                        else{
                                            $total +=  $item->menu->menu_price * $item->menu_qty ;
                                        }                   
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <h4 class="px-2">Grand Total : <span class="float-end">Rp.{{ $total }}</span> </h4>
                                <hr>
                                <button type="submit" class="btn btn-success w-100 float-end">Cash</button>
                                <button type="button" class="btn btn-primary w-100 float-end mt-3 gopay">Pay with GoPay</button>
                                <button type="button" class="btn btn-primary w-100 float-end mt-3 gopay">Pay with Paypal</button>
                                
                            @else
                                <h5>No menu in here</h5>
                            @endif
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection



