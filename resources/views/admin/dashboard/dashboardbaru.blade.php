@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Welcoming Message -->
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Selamat datang di Panel Admin!</h4>
                <p>Silakan kelola informasi desa dengan cermat dan efisien.</p>
            </div>
        </div>
    </div>

    <!-- Village Image Carousel -->
    {{-- <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel"
        style="max-height: 300px; overflow: hidden;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <!-- Add more indicators if needed -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('../assets/img/desa1.jpg') }}" class="d-block w-100" alt="Village Image 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('../assets/img/desa2.jpg') }}" class="d-block w-100" alt="Village Image 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('../assets/img/desa3.jpeg') }}" class="d-block w-100" alt="Village Image 3">
            </div>
            <!-- Add more carousel items with images -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Peternakan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/pekerjaan_desa/peternakan">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Profil Desa -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-info-circle me-1"></i>
            Profil Desa
        </div>
        <div class="card-body">
            <p>Provide a brief description or information about the village here.</p>
        </div>
    </div>

    <!-- Visi dan Misi -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-bullseye me-1"></i>
            Visi dan Misi
        </div>
        <div class="card-body">
            <h5>Visi:</h5>
            <p>Describe the vision of the village.</p>

            <h5>Misi:</h5>
            <p>Outline the mission of the village.</p>
        </div>
    </div>

    <!-- Existing Dashboard Content -->
    <!-- ... (Keep the existing dashboard content) ... -->
@endsection
