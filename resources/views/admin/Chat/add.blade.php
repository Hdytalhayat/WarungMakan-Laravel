@extends('layouts.admin')

@section('title')
    Add Chat
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">/
                <div class="card-header">
                    <h4>Add Chat</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('insert-chat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Pertanyaan</label>
                                <input type="text" class="form-control" value="" name='queries' placeholder="Apa kabar? | Apa kabarmu?">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Jawaban</label>
                                <input type="text" class="form-control" value="" name='replies' placeholder="Kabar Saya baik">
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
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.1/model-viewer.min.js"></script>

    
@endsection