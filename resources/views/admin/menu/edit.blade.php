@extends('layouts.admin')

@section('title')
    Add Menu
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">/
                <div class="card-header">
                    <h4>Add Menu</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-menu/'.$menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select class="form-select">
                                    <option selected>{{ $menu->Categories->name }}</option>
                                  </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{ $menu->name }}" name='name'>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" value="{{ $menu->slug }}" name='slug'>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Small Description</label>
                                <textarea name="small_description" rows="3" class="form-control">{{ $menu->small_description }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control" >{{ $menu->description }}</textarea>
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label for="">Promo</label>
                                <input type="checkbox" class="form-control" name='trending' {{ $menu->trending == '1' ? 'checked':''}}>
                            </div> --}}
                            <div class="col-md-3 mb-3">
                                <label for="">Original Price</label>
                                <input type="number" class="form-control" value="{{ $menu->original_price }}" name='original_price'>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Promo Price</label>
                                <input type="number" class="form-control" value="{{ $menu->menu_price }}" name='menu_price'>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Hidden</label>
                                <input type="checkbox" class="form-control" name='status' {{ $menu->status == '1' ? 'checked':''}}>
                            </div>
                            <div class="col-md-12">
                                <label for="">Image</label><br>
                                @if($menu->image)
                                <img class="cate-img" src="{{ asset('assets/uploads/menu/'.$menu->image)}}" alt="menu Image">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="">Model 3D</label><br>
                                @if($menu->model)
                                <model-viewer camera-controls touch-action="pan-y" src="{{asset('assets/uploads/model/'.$menu->model)}}" alt=""></model-viewer>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" accept=".jfif,.jpeg,.jpg,.png" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Model 3D (.glb)</label>
                                <input type="file" accept=".glb" name="model" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="image" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>

    
@endsection