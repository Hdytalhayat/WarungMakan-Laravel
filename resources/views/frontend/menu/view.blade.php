@extends('layouts.frontend')

@section('title', $menu->name)

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('rating') }}" method="POST">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate {{ $menu->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    @if ($user_rating)
                        @for($i=1;$i<=$user_rating->stars;$i++)
                            <input type="radio" value="{{ $i }}" name="menu_rating" checked id="rating{{ $i }}">
                            <label for="rating{{ $i }}" class="fa fa-star"></label>
                        @endfor
                        @for($j=$user_rating->stars+1;$j<=5;$j++)
                            <input type="radio" value="{{ $j }}" name="menu_rating" id="rating{{ $j }}">
                            <label for="rating{{ $j }}" class="fa fa-star"></label>
                        @endfor
                    @else
                    
                        <input type="radio" value="1" name="menu_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="menu_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="menu_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="menu_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="menu_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    @endif
                    
                </div>        
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Submit</button>
        </div>
        </form>
        


      </div>
    </div>
  </div>
    <div class="py-3 mb-4 shadow-sm bg-secondary border-top">
        <div class="container">
        <h6 class="mb-0"><a href="/view-categories">Categories</a> / <a href="{{ url('view-categories/'.$menu->categories->slug) }}">{{ $menu->categories->name }} </a>/ <a href="{{ url('view-categories/'.$menu->categories->slug.'/'.$menu->name) }}">{{ $menu->name }}</a></h6>
        </div>
    </div>

    <div class="container pb-5">
        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="row menu_data">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/menu/'.$menu->image) }}" alt="menu..." class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $menu->name }}
                            
                            <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">{{ $menu->menu_price == NULL?'':'Promo' }}</label>
                        </h2>
                        <hr>

                        @if ($menu->menu_price == NULL)
                        <label for="" style="font-weight: bold" class="me-3">Price : Rp. {{ $menu->original_price }} </label>
                        @else
                        <label for="" class="me-3">Original Price : <s>Rp. {{ $menu->original_price }}</s> </label>
                        <label style="font-weight: bold" class="me-3">Promo Price : Rp. {{ $menu->menu_price }} </label>
                        @endif
                       
                        <hr>
                        @php
                            $avg = number_format($rating_avg)
                        @endphp
                        <div class="rating">
                            @for($i=1;$i<=$avg;$i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j=$avg+1;$j<=5;$j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($rating->count()==0)
                                    not rated yet
                                @else
                                    {{ $rating->count() }} Ratings
                                @endif
                                
                            </span>
                        </div>
                        <p class="mt-3">
                            {!! $menu->small_description !!}
                        </p>
                        <hr>
                        <div class="row mt-5">
                            <div class="col-md-2 me-2">
                                <input type="hidden" value="{{ $menu->id }}" class="menu_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="Quantity" class="form-control qty-input text-center" width="100" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                                    
                            </div>
                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-danger me-3 float-start addwish"><i class="material-symbols-outlined">
                                    favorite
                                  </i></button>
                                <button type="button" class="btn btn-success me-3 float-start addcart"><i class="material-symbols-outlined">
                                    shopping_cart
                                  </i></button>
                                <button type="button" class="btn btn-danger me-3 float-start"><a class="text-white" href="{{ url('model/'.$menu->id) }}"><i class="material-symbols-outlined">
                                    3d_rotation
                                </i></a></button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3>Description</h3>
                        <p class="mt-3">
                            {!! $menu->description !!}
                        </p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-link m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa fa-star"></i> Rate this menu
                                </button>
                                
                                <a href="{{ url('review/'.$menu->slug.'/user-review') }}" class="btn btn-link m-1" >
                                    <i class="fa fa-comment"></i> Write a review
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-8 mb-5">
                        @foreach ($review as $item)
                            <label for="">{{ $item->User->name.' '.$item->User->last_name }}</label>
                            @if ($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/'.$menu->slug.'/user-review') }}">edit</a>
                            @endif
                            <br>
                            @if ($item->Rating)
                            @php
                                $user_rated = $item->Rating->stars
                            @endphp
                                @for($i=1;$i<=$user_rated;$i++)
                                <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j=$user_rated+1;$j<=5;$j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            
                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->reviews }}
                            </p>
                        
                        @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer')
    @include('layouts.src.footer')
@endsection







