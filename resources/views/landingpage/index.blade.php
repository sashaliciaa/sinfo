<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ env('APP_NAME') }} </title>
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

    <x-landingNav />

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Selamat Datang di </h1>
            <h1>Desa<span>
                    <tr>Sindangmekar
                </span></h1>
            <h2>Sindangmekar adalah desa di kecamatan <br>Dukupuntang, Cirebon, Jawa Barat, Indonesia .</h2>
            <!-- <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                        class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>-->
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <section id="tentangkami" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>TENTANG KAMI</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/desa-sindangmekar.png') }}" class="img-fluid"
                            style="max-width: 80%;" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <p>

                            Desa Sindangmekar, terletak di Kecamatan Dukupuntang, Kabupaten Cirebon, Jawa Barat, dikenal
                            sebagai desa yang subur dengan luas wilayah 171,6600 Ha. Mayoritas penduduknya adalah petani
                            dengan lahan pertanian sekitar 100 Ha. Berperan sebagai desa penyangga ibu kota Kabupaten,
                            Sindangmekar memainkan peran penting dalam perkembangan daerah tersebut.
                            <br>
                            <br>
                            Dilintasi oleh jalan provinsi Nyi Ageng Serang dan jalan Pangeran Panjunan, desa ini
                            menghubungkan Kabupaten Cirebon dengan Majalengka dan Kuningan. Dengan Sungai Cisoka yang
                            membelahnya, Desa Sindangmekar menawarkan keindahan alam dengan pepohonan hijau, sungai yang
                            mengalir, dan sawah kuning, menciptakan suasana yang asri dan subur.
                            <br>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Visi Misi Section ======= -->
        <section id="visimisi" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>VISI & MISI</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/visimisi.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <h3>VISI</h3>
                        <P>
                            Menjadi desa yang mandiri, sejahtera, dan berbudaya, diakui sebagai pusat pembangunan
                            berkelanjutan di wilayah ini.
                        </P>
                        <h3>MISI</h3>
                        <P>
                            1. Pembangunan Ekonomi<br>
                            2. Kesejahteraan Masyarakat<br>
                            3. Pemeliharaan Lingkungan<br>
                            4. Partisipasi Masyarakat<br>
                            5. Pengembangan Budaya dan Pariwisata<br>
                            6. Infrastruktur dan Aksesibilitas<br>
                            7. Keamanan dan Ketertiban
                        </P>
                    </div>
                </div>

            </div>
        </section>

        <!-- ======= Struktur Organisasi Section ======= -->
        <section id="strukturorganisasi" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3><span>STRUKTUR ORGANISASI</span></h3>
                </div>
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-right" data-aos-delay="100" style="text-align: center;">
                        @if ($struktur == null)
                            <h3 class="p-5 border border-3 border-dark"><i class="bi bi-emoji-frown-fill"></i><br>Belum
                                ada
                                Struktur
                                Organisasi
                            </h3>
                        @else
                            <img src="{{ asset('../Struktur_Organisasi/' . $struktur) }}" class="img-fluid"
                                alt="">
                        @endif
                    </div>
                </div>

            </div>
        </section><!-- End Struktur Organisasi Section -->

        <!-- ======= Team Section ======= -->
        <section id="perangkatdesa" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3><span>PERANGKAT DESA</span></h3>
                </div>

                <div class="row">
                    @foreach ($perangkat as $itemPerangkat)
                        @if ($itemPerangkat->status == 1)
                            <div class="col-lg-2 col-md-6 col-sm-4 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="member text-center">
                                    <div class="member-img">
                                        <img src="{{ asset('Foto_perangkat_desa/' . $itemPerangkat->foto) }}"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ $itemPerangkat->jabatans->jabatan }}</h4>
                                        <h6>{{ $itemPerangkat->nama_awal }} {{ $itemPerangkat->nama_akhir }}</h6>
                                        <!-- Improved "Lihat Detail" button -->
                                        <button type="button" class="btn btn-info mt-3" data-toggle="modal"
                                            data-target="#modal{{ $itemPerangkat->id }}">
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $itemPerangkat->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ $itemPerangkat->jabatans->jabatan }}
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('Foto_perangkat_desa/' . $itemPerangkat->foto) }}"
                                                class="img-fluid mb-3" style="max-width: 150px; max-height: 150px;"
                                                alt="Perangkat Image">

                                            <table class="table">
                                                <tr>
                                                    <td><strong>Nama</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $itemPerangkat->nama_awal }}
                                                        {{ $itemPerangkat->nama_akhir }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Alamat</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $itemPerangkat->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $itemPerangkat->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>No. Telepon</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $itemPerangkat->telp }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Jabatan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $itemPerangkat->jabatans->jabatan }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tanggal Mulai Jabatan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $itemPerangkat->tgl_mulai_jabat }}</td>
                                                </tr>
                                            </table>
                                            <br>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section><!-- End Team Section -->

        <!-- ======= Pertanian ======= -->
        <section id="pertanian" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>PERTANIAN</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/sawah.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <p style="text-align: justify;">
                            Pertanian di Desa Sindangmekar adalah landasan utama kehidupan masyarakatnya, mencerminkan
                            harmoni antara tradisi dan modernitas. Dengan tanaman padi sebagai tulang punggung ekonomi,
                            petani Desa Sindangmekar juga aktif dalam diversifikasi pertanian dengan menanam jagung,
                            kedelai, dan sayuran lainnya. Sistem pertanian yang dijalankan menunjukkan perpaduan antara
                            praktik tradisional dan penggunaan teknologi modern, dengan irigasi yang baik untuk menjaga
                            kestabilan pasokan air. Selain itu, peternakan ayam dan sapi memberikan kontribusi penting
                            dalam mendiversifikasi pendapatan. <br>
                        <h4>3 Kelompok Tani :</h4>
                        1. Sampir jaya (paling luas)<br>
                        2. Asem jaya<br>
                        3. Bungur jaya<br><br>
                        <div class col-lg-3>
                            <a href="/pertanian-show" class="btn btn-dark">
                                Data Pertanian <i class="bi bi-chevron-compact-right"></i>
                            </a>
                        </div>
                        </P>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Pertanian -->

        <!-- ======= Perkebunan ======= -->
        <section id="perkebunan" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>PERKEBUNAN</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/perkebunan.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <p style="text-align: justify;">
                            Perkebunan di Desa Sindangmekar memainkan peran krusial dalam membangun perekonomian lokal.
                            Tanaman-tanaman perkebunan seperti teh, kopi, dan buah-buahan tumbuh subur di lahan-lahan
                            subur desa ini. Keahlian petani perkebunan dalam merawat dan mengelola tanaman mereka
                            menciptakan hasil yang berkualitas tinggi. Sistem irigasi yang efisien turut mendukung
                            pertumbuhan tanaman, sementara penerapan teknologi pertanian modern memberikan kontribusi
                            pada peningkatan produktivitas. Masyarakat Desa Sindangmekar terlibat aktif dalam asosiasi
                            petani perkebunan, membentuk jaringan kerja sama yang kuat untuk memfasilitasi pemasaran
                            hasil perkebunan dan meningkatkan kesejahteraan ekonomi mereka. Meskipun menghadapi
                            tantangan seperti fluktuasi harga pasar dan perubahan iklim, semangat inovasi dan ketekunan
                            petani perkebunan tetap menjadikan sektor ini sebagai salah satu pilar utama dalam
                            perkembangan ekonomi desa.
                        </P>
                        <div class col-lg-3>
                            <a href="/perkebunan-show" class="btn btn-dark">
                                Data Perkebunan <i class="bi bi-chevron-compact-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Perkebunan -->

        <!-- ======= Peternakan ======= -->
        <section id="peternakan" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>PETERNAKAN</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/peternakan.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <p style="text-align: justify;">
                            Peternakan di Desa Sindangmekar menjadi pilar vital dalam struktur ekonomi lokal. Penduduk
                            desa aktif terlibat dalam beternak ayam dan sapi, memberikan kontribusi penting dalam
                            mendiversifikasi pendapatan masyarakat. Keahlian peternak dalam merawat ternak mereka
                            menciptakan hasil yang berkualitas tinggi. Sistem manajemen peternakan modern, termasuk
                            penerapan teknologi, membantu meningkatkan produktivitas dan kesejahteraan hewan. Masyarakat
                            Desa Sindangmekar juga terorganisir dalam kelompok peternakan dan koperasi, memperkuat
                            sinergi antarpeternak serta memfasilitasi pemasaran produk peternakan. Meskipun dihadapkan
                            pada tantangan seperti fluktuasi harga dan faktor lingkungan, semangat berdaya saing dan
                            inovasi di bidang peternakan tetap mempertahankan perannya sebagai aset kunci dalam
                            pembangunan ekonomi desa.
                        </P>
                        <div class col-lg-3>
                            <a href="/peternakan-show" class="btn btn-dark">
                                Data Peternakan <i class="bi bi-chevron-compact-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Peternakan -->

        <!-- ======= Perikanan ======= -->
        <section id="perikanan" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>PERIKANAN</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/perikanan.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <p style="text-align: justify;">
                            Perikanan di Desa Sindangmekar memberikan kontribusi signifikan terhadap kehidupan
                            masyarakat, melibatkan mereka dalam kegiatan penangkapan ikan dan budidaya perairan. Desa
                            ini dikenal dengan keragaman jenis ikan air tawar yang ditangkap, seperti nila, lele, dan
                            ikan mas. Selain itu, praktik budidaya ikan air tawar juga berkembang pesat, melibatkan
                            petani perikanan yang mahir dalam memelihara dan meningkatkan produktivitas kolam ikan
                            mereka. Sistem manajemen perikanan berbasis teknologi modern membantu meningkatkan hasil
                            tangkapan dan keberlanjutan lingkungan. Masyarakat Desa Sindangmekar, terorganisir dalam
                            kelompok perikanan, menjalankan prinsip-prinsip pembudidayaan ikan yang bertanggung jawab,
                            menciptakan lingkungan yang mendukung ekosistem perairan dan memberikan manfaat ekonomi yang
                            berkelanjutan bagi mereka. Meskipun menghadapi tantangan seperti perubahan iklim dan
                            ketersediaan sumber daya, keberlanjutan dan inovasi terus menjadi fokus utama dalam menjaga
                            kelestarian sektor perikanan desa.
                        </P>
                        <div class col-lg-3>
                            <a href="/perikanan-show" class="btn btn-dark">
                                Data Perikanan <i class="bi bi-chevron-compact-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Perikanan -->

        <!-- ======= Meuble ======= -->
        <section id="meubel" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3> <span>MEUBEL</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets2/img/meubel.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <p style="text-align: justify;">
                            Desa Sindangmekar menjadi pusat produksi meubel yang mengesankan, mencerminkan keahlian
                            tinggi dan warisan tangan terampil masyarakatnya dalam industri perkayuan. Desa ini terkenal
                            dengan berbagai jenis meubel berkualitas, seperti kursi, meja, dan lemari, yang diproduksi
                            secara tradisional dengan sentuhan modern. Pengrajin meubel di Desa Sindangmekar
                            mengutamakan kualitas bahan baku kayu yang digunakan, menciptakan produk yang tahan lama dan
                            estetis. Proses produksi meubel ini melibatkan sejumlah tangan terampil, mulai dari
                            pemilihan kayu hingga tahap penyelesaian dan pewarnaan. Koperasi pengrajin meubel lokal
                            berperan penting dalam mendukung pemasaran dan distribusi produk, menciptakan dampak positif
                            terhadap ekonomi desa serta mempromosikan keunikan desain meubel lokal. Meskipun dihadapkan
                            pada tantangan dalam hal persaingan pasar dan bahan baku, industri produksi meubel di Desa
                            Sindangmekar terus berkembang dan memberikan kontribusi yang berarti terhadap pertumbuhan
                            ekonomi lokal.
                        </P>
                        <div class col-lg-3>
                            <a href="/meubel-show" class="btn btn-dark">
                                Data Meubel <i class="bi bi-chevron-compact-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Meubel -->

        {{-- Agenda Kegiatan Section --}}
        <section id="agendakegiatan" class="portfolio-details">
            <div class="container">

                <div class="section-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3> <span>AGENDA KEGIATAN</span></h3>
                        <a href="/agenda-show" class="btn btn-dark">
                            Lihat lebih banyak <i class="bi bi-chevron-compact-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($agenda as $itemAgenda)
                        <div class="col-sm-6 mb-lg-3 col-lg-4 mb-sm-0">
                            <div class="card d-flex flex-column h-100 shadow-sm">
                                <div class="card-header d-flex flex-column h-100 bg-secondary text-white">
                                    <b>
                                        <h5 class="p-0 m-0">
                                            {{ $itemAgenda->nama_agenda }}
                                        </h5>
                                    </b>
                                </div>
                                <div class="card-body flex-fill">
                                    <p class="card-text">
                                        {{ $itemAgenda->keterangan ? $itemAgenda->keterangan : 'Tidak Ada Keterangan' }}
                                    </p>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>
                                                @if ($itemAgenda->tgl_kegiatan_mulai == $itemAgenda->tgl_kegiatan_selesai)
                                                    {{ \Carbon\Carbon::parse($itemAgenda->tgl_kegiatan_mulai)->locale('id')->isoFormat('D MMMM Y') }}
                                                @else
                                                    {{ \Carbon\Carbon::parse($itemAgenda->tgl_kegiatan_mulai)->locale('id')->isoFormat('D MMMM Y') }}
                                                    s/d
                                                    {{ \Carbon\Carbon::parse($itemAgenda->tgl_kegiatan_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jam</td>
                                            <td>:</td>
                                            <td>
                                                {{ $itemAgenda->jam_mulai }} WIB s/d
                                                @if ($itemAgenda->jam_selesai == '23:59:59')
                                                    Selesai
                                                @else
                                                    {{ $itemAgenda->jam_selesai }} WIB
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tempat</td>
                                            <td>:</td>
                                            <td>
                                                {{ $itemAgenda->tempat }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- ======= Galeri Section ======= -->
        <section id="galeri" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3> <span>GALERI DESA</span></h3>
                        <a href="/galeri-show" class="btn btn-dark">
                            Lihat lebih banyak<i class="bi bi-chevron-compact-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($galeri as $itemGaleri)
                        @if ($count < 10)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                                <div class="border rounded overflow-hidden">
                                    <img src="{{ asset('Foto_galeri/' . $itemGaleri->foto_galeri) }}"
                                        class="img-fluid" alt="{{ $itemGaleri->nama_galeri }}">
                                    <h5 class="fw-bold my-2 mx-2">{{ $itemGaleri->nama_foto }}</h5>
                                </div>
                            </div>
                            @php
                                $count++;
                            @endphp
                        @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Galeri Section -->

</body>

<!-- ======= Contact Section ======= -->
<section id="lokasi" class="contact">
<div class="container" data-aos="fade-up">

    <div class="section-title">
        <h3><span>LOKASI</span></h3>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-12">
            <iframe class="mb-4 mb-lg-0 rounded"
                src="https://maps.google.com/maps?q=sindangmekar&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>
    </div>
</div>
</section><!-- End Contact Section -->



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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="{{ asset('assets2/js/main.js') }}"></script>

</body>

</html>
