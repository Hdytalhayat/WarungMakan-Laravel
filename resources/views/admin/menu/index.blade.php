@extends('layouts.admin')

@section('title')
    Menues
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Menues</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Categories</th>
                                <th>Name</th>
                                <th>Original Price</th>
                                <th>menu Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Categories->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->original_price }}</td>
                                <td>{{ $item->menu_price }}</td>
                                <td>
                                    <img class="cate-img" src="{{ asset('assets/uploads/menu/'.$item->image) }}" alt="image here..">    
                                </td>
                                <td>
                                    <a href="{{ url('edit-menu/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('delete-menu/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection