@extends('layouts.admin')

@section('title')
    Edit Categories
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Categories</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-categories/'.$categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input value="{{ $categories->name }}" type="text" class="form-control" name='name'>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input value="{{ $categories->slug }}" type="text" class="form-control" name='slug'>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ $categories->description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input {{ $categories->status = '1' ? 'checked':'' }} type="checkbox" class="form-control" name='status'>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Popular</label>
                                <input {{ $categories->popular = '1' ? 'checked':'' }} type="checkbox" class="form-control" name='popular'>
                            </div>
                            <div class="col-md-12">
                                @if($categories->image)
                                    <img src="{{ asset('assets/uploads/categories/'.$categories->image)}}" alt="Categories Image">
                                @endif
                                <input type="file" name="image" class="form-control">
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
    
@endsection