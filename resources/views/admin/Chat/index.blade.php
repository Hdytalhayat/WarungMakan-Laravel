@extends('layouts.admin')

@section('title')
    Chat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Chatbot</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chat as $item)
                            <tr>
                                <td>{{$item->queries}}</td>
                                <td>{{$item->replies}}</td>
                                <td>
                                    <a href="{{ url('edit-chat/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('delete-chat/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
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