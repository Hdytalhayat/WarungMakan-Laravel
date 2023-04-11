@extends('layouts.frontend')

@section('title')
    Model 3D
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-secondary border-top">
    <div class="container">
    <h6 class="mb-0"><a href="/view-categories">Categories</a> / <a href="{{ url('view-categories/'.$menu->categories->slug) }}">{{ $menu->categories->name }} </a>/ <a href="{{ url('view-categories/'.$menu->categories->slug.'/'.$menu->name) }}">{{ $menu->name }}</a> / <a href="{{ url('model/'.$menu->id) }}">Model 3d</a></h6>
    </div>
</div>

    <div class="container pb-5 ">
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col">
                <div class="card shadow mb-5 text-center" style="width: auto;">
                    <div class="card"><h1>{{$menu->name}}</h1></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                {{-- <img src="{{ asset('assets/uploads/qr/'.$menu->model) }}" alt=""> --}}
                                
                                <model-viewer camera-controls touch-action="pan-y" src="{{asset('assets/uploads/model/'.$menu->model)}}" alt=""></model-viewer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
          </div>
        

    </div>
@endsection
@section('footer')
    @include('layouts.src.footer')
@endsection
@section('scripts')
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>


@endsection







