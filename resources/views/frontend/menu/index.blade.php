@extends('layouts.frontend')

@section('title')
    menu
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-secondary border-top">
    <div class="container">
        <h6 class="mb-0"><a href="/view-categories">Categories</a> / <a href="{{ url('view-categories/'.$categories->slug) }}">{{ $categories->name }} </a></h6>
    </div>
</div>
<div class="py-5 mb-5">
    <div class="container">
        <div class="row">
            <h2>{{ $categories->name }}</h2>
                        @foreach ($menu as $item)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <a href="{{ url('view-categories/'.$categories->slug.'/'.$item->slug) }}">
                                        <img src="{{ asset('assets/uploads/menu/'.$item->image) }}" class="w-100" alt="menu..">
                                        <div class="card-body">
                                            <h5>{{ $item->name }}</h5>
                                            @if ($item->menu_price == NULL)
                                            <span class="float-end">{{ $item->original_price }}</span>
                                            @else
                                            <span class="float-start">{{ $item->menu_price }}</span>
                                            <span class="float-end"><s>{{ $item->original_price }}</s></span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection