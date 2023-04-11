@extends('layouts.frontend')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h2>All Categories</h2>
                    @foreach ($categories as $item)
                        <div class="col-md-3 mt-3">
                            <a href="{{ url('view-categories/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/categories/'.$item->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection