@extends('layouts.frontend')

@section('title')
    Review
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-body">
                            <h5>You are writing a review for {{ $review->menu->name }}</h5>
                            <form action="{{ url('/update-review') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <textarea name="user_review" rows="5" class="form-control">{{ $review->reviews }}</textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection