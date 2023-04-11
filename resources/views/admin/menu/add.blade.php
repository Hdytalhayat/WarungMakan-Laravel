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
                    <form action="{{ url('insert-menu') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select class="form-select" name="cate_id" required>
                                    <option selected>Select a Categories</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name='name' required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name='slug' placeholder="untuk url" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Small Description</label>
                                <textarea name="small_description" rows="3" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control" required></textarea>
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label for="">Promo</label>
                                <input type="checkbox" class="form-control" name='trending' id="myCheck" onclick="myFunction()>
                                <p id="text" style="display:none">Checkbox is CHECKED!</p>
                            </div> --}}
                            <div class="col-md-3 mb-3">
                                <label for="">Original Price</label>
                                <input type="number" class="form-control" name='original_price' placeholder="10000" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Promo Price</label>
                                <input type="number" class="form-control" name='menu_price' placeholder="Isi jika ada promo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Hidden</label>
                                <span class="fs-6 fw-light">*jangan cek jika ingin visible</span>
                                <input type="checkbox" class="form-control" name='status'>
                            </div>
                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" accept=".jfif,.jpeg,.jpg,.png" name="image" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Model 3D (.glb)</label>
                                <input type="file" accept=".glb" name="model" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="image" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
