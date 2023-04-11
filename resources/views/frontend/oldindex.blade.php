@extends('layouts.frontend')

@section('title')
    E-menuz
@endsection

@section('content')
@include('layouts.src.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel owl-theme">
                        @foreach ($trending_menu as $item)
                            <div class="item">
                                <a href="{{ url('view-categories/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/categories/'.$item->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <span class="float-start">{{ $item->menu_price }}</span>
                                        <span class="float-end"><s>{{ $item->original_price }}</s></span>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured menu</h2>
                <div class="owl-carousel owl-theme">
                        @foreach ($featured_menu as $item)
                            <div class="item">
                                <a href="{{ url('view-categories/'.$item->Categories->slug.'/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/menu/'.$item->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <span class="float-start">{{ $item->menu_price }}</span>
                                        <span class="float-end"><s>{{ $item->original_price }}</s></span>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
        });
    </script>
@endsection

