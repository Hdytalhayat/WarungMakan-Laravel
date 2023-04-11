@extends('layouts.frontend')

@section('title')
    Warung Irfan
@endsection

@section('content')


<!-- End Why Choose Us Section -->

<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Our Team</h2>
            </div>
        </div>

        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/img/iffad.jpg')}}" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Achmad Iffad</span></a></h3>
    <span class="d-block position mb-4">CEO, Founder Warung Makan.</span>
    <p>Mahasiswa Universitas Negeri Malang, Prodi S1 Teknik informatika Offering A, Angkatan 2021</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/img/ardi.jpg')}}" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">Ardi Anugerah.W</span></a></h3>
    <span class="d-block position mb-4">CEO, Founder Warung Makan.</span>
    <p>Mahasiswa Universitas Negeri Malang, Prodi S1 Teknik informatika Offering A, Angkatan 2021</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

            </div> 
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/img/hayat.jpg')}}" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Hidayatul Hayat</span></a></h3>
    <span class="d-block position mb-4">CEO, Founder Warung Makan.</span>
    <p>Mahasiswa Universitas Negeri Malang, Prodi S1 Teknik informatika Offering A, Angkatan 2021</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/img/irfan.jpg')}}" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">Irfan Rafif Shidqi</span></a></h3>
    <span class="d-block position mb-4">CEO, Founder Warung Makan.</span>
    <p>Mahasiswa Universitas Negeri Malang, Prodi S1 Teknik informatika Offering A, Angkatan 2021</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

  
            </div> 
            <!-- End Column 4 -->

            

        </div>
    </div>
</div>
<!-- End Team Section -->

@endsection

@section('footer')
@include('layouts.src.footer')
@endsection


