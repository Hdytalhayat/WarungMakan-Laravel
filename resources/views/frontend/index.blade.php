@extends('layouts.frontend')

@section('title')
    Warung Irfan
@endsection

@section('content')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1 class="animate__animated animate__fadeInDown">Selamat Datang<span class="d-block">Berkunjung</span></h1>
                    <p class="mb-4">Website ini dibuat untuk memudahkan para penggunanya untuk memesan makanan dengan cara yang fleksibel</p>
                    <p><a href="view-categories/" class="btn btn-secondary me-2">Beii Sekarang</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('assets/img/bowl-3.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col">
                <h2 class="mb-4 section-title">Pesan Makananmu Sekarang</h2>
                <p class="mb-4">Menu di restoran kami adalah pilihan hidangan yang dipilih dengan cermat yang akan menggoda selera Anda dan membuat Anda merasa puas. Kami hanya menggunakan bahan-bahan paling segar, yang bersumber dari peternakan dan pemasok lokal, untuk menciptakan hidangan yang lezat dan berkelanjutan. </p>
                
            </div> 
            <!-- End Column 1 -->
  
            

        </div>
    </div>
</div>
<!-- End Product Section -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="mb-4 section-title">Categories</h2>
                <div class="owl-carousel owl-theme">
                        @foreach ($categories as $item)
                            <div class="item">
                                <a href="{{ url('view-categories/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/categories/'.$item->image) }}" alt="">
                                    
                                </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="mb-4 section-title">Menus</h2>
                <div class="owl-carousel owl-theme">
                        @foreach ($featured_menu as $item)
                            <div class="item">
                                <a href="{{ url('view-categories/'.$item->Categories->slug.'/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/menu/'.$item->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        @if ($item->menu_price == NULL)
                                        <span class="float-end">{{ $item->original_price }}</span>
                                        @else
                                        <span class="float-start">{{ $item->menu_price }}</span>
                                        <span class="float-end"><s>{{ $item->original_price }}</s></span>
                                        @endif
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">
                    <H2 class="text-center mb-4 section-title">Features</H2>
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('assets/img/chat.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Chatbot</h3>
								<p>Anda bisa mencoba chatbot yang akan membantu anda dalam menggunakan web ini</p>
								<p><a href="chatbot">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('assets/img/normalicon.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Normal</h3>
								<p>Memiliki menu e-commerce seperti yang lain</p>
								<p><a href="view-categories">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('assets/img/3d.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>3D Model</h3>
								<p>Anda bisa melihat menu secara 3D</p>
								<p><a href="view-categories">Read More</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->
@endsection

@section('footer')
@include('layouts.src.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
        });
    </script>
@endsection

