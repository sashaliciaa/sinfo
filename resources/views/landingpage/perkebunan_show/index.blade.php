<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sindangmekar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets2/img/desa-sindangmekar.png') }}" rel="icon">
    <link href="{{ asset('assets2/img/desa-sindangmekar.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Sindangmekar
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/Sindangmekar-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:desasindangmekar57@gmail.com">desasindangmekar57@gmail.com</a></i>
            </div>
        </div>
    </section>
    <!-- ======= Header ======= -->
    <x-landingNav />

    <!-- ======= Perkebunan Section ======= -->
    <section id="perkebunan" class="portfolio-details">
        <div class="container">

            <div class="section-title">
                <h3> <span>DATA PERKEBUNAN</span></h3>
            </div>

            <div class="row">
                @foreach ($perkebunan as $itemPerkebunan)
                    <div class="col-sm-6 mb-lg-3 col-lg-4 mb-sm-0">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-light border-bottom">
                                <h5 class="p-0 m-0 text-dark">
                                    Jenis Tanaman: {{ $itemPerkebunan->jenis_tanaman }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">
                                <table class="table">
                                    <tr>
                                        <td><strong>Waktu Tanam</strong></td>
                                        <td>:</td>
                                        <td>{{ $itemPerkebunan->waktu_tanam }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Waktu Panen</strong></td>
                                        <td>:</td>
                                        <td>{{ $itemPerkebunan->waktu_panen }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Luas Wilayah Tanam</strong></td>
                                        <td>:</td>
                                        <td>{{ $itemPerkebunan->luas_wilayah_tanam }} m<sup>2</sup></td>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Perkebunan Section -->


</body>
</main><!-- End #main -->
<x-landingfoot />

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets2/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets2/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets2/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets2/js/main.js') }}"></script>

</body>

</html>
