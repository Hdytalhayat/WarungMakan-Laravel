@extends('layouts.frontend')

@section('title')
    My Cart
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
            </a>
        </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow cartitem mb-5">
            @if ($cart_item ->count()>0)
                @php
                    $total = 0;
                @endphp
                @foreach ($cart_item as $item)
                <div class="card-body menu_data">
                    <div class="row ">
                        <div class="col-md-2 my-auto">
                            <img height="70px" width="70px" src="{{ asset('assets/uploads/menu/'.$item->menu->image) }}" alt="">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->menu->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            @if ($item->menu_price == NULL)
                            <h6>Rp.{{ $item->menu->original_price }}</h6>
                            @else
                            <h6>Rp.{{ $item->menu->menu_price }}</h6>
                            @endif
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="menu_id" value="{{ $item->menu_id }}">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px">
                                <button class="input-group-text change-btn decrement-btn">-</button>
                                <input type="text" name="Quantity" class="form-control qty-input text-center" value="{{ $item->menu_qty }}">
                                <button class="input-group-text change-btn increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
                @php
                    if ($item->menu_price == NULL){
                        $total +=  $item->menu->original_price * $item->menu_qty ;
                    }
                    else{
                        $total +=  $item->menu->menu_price * $item->menu_qty ;
                    }
                @endphp
                @endforeach
                <div class="card-footer">
                    <h5>Total Price : Rp.{{ $total }} 
                        <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                    </h5>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-shopping-cart"></i> cart is empty</h2>
                    <a href="{{ url('/view-categories') }}" class="btn btn-outline-primary float-end">Go to menu categories</a>
                </div>
            @endif
            
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection



