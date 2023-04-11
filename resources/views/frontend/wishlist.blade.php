@extends('layouts.frontend')

@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-secondary border-top">
        <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> / 
            <a href="{{ url('wishlist') }}">
                Favorite
            </a>
        </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow wishitem mb-5">
            <div class="card-body">
                @if ($wishlist->count() >0)
                    @foreach ($wishlist as $item)
                    <div class="card-body menu_data">
                        <div class="row ">
                            <div class="col-md-2 my-auto">
                                <img height="70px" width="70px" src="{{ asset('assets/uploads/menu/'.$item->menu->image) }}" alt="">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->menu->name }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="menu_id" value="{{ $item->menu_id }}">
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="Quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-3 my-auto">
                                <button class="btn btn-success addcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-wishlist"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>

                @endforeach
                @else
                    <h4>There are not menu in your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection





