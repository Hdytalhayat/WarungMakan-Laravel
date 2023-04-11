@extends('layouts.frontend')

@section('title')
    Review
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-body">
                        @if ($verified_purchase->count() >0)
                            <h5>You are writing a review for {{ $menu->name }}</h5>
                            <form action="{{ url('review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <textarea name="user_review" rows="5" class="form-control" placeholder="Write a review here" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>You are not eligible to review this menu</h5>
                                <p>
                                    only customers who ordered can review
                                </p>
                                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to homepage</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection