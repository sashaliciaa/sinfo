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

    <div class="row">
        <div class="col-12">
            <p><b>Quick Data Count</b></p>
        </div>
        <div class="col-xl col-md">
            <div class="card mb-4" style="border-left: 10px solid #007bff;">
                {{-- <div class="card-header"></div> --}}
                <div class="card-body">Pertanian
                    <h3>{{ $pertanians->count() }}</h3>
                </div>
                {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white w-100 d-flex justify-content-between align-items-center"
                        href="/pekerjaan_desa/peternakan">Lihat Detail <i class="fas fa-angle-right"></i></a>
                </div> --}}
            </div>
        </div>
        <div class="col-xl col-md">
            <div class="card mb-4" style="border-left: 10px solid #007bff;">
                {{-- <div class="card-header"></div> --}}
                <div class="card-body">
                    <small>Peternakan</small>
                    <h3>{{ $peternakans->count() }}</h3>
                </div>
                {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-dark w-100 d-flex justify-content-between align-items-center"
                        href="/potensi_desa/peternakan">Lihat Detail <i class="fas fa-angle-right"></i></a>
                </div> --}}
            </div>
        </div>
        <div class="col-xl col-md">
            <div class="card mb-4" style="border-left: 10px solid #007bff;">
                {{-- <div class="card-header"></div> --}}
                <div class="card-body">Perkebunan
                    <h3>{{ $perkebunans->count() }}</h3>
                </div>
                {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white w-100 d-flex justify-content-between align-items-center"
                        href="/pekerjaan_desa/peternakan">Lihat Detail <i class="fas fa-angle-right"></i></a>
                </div> --}}
            </div>
        </div>
        <div class="col-xl col-md">
            <div class="card mb-4" style="border-left: 10px solid #007bff;">
                {{-- <div class="card-header"></div> --}}
                <div class="card-body">Perikanan
                    <h3>{{ $perikanans->count() }}</h3>
                </div>
                {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white w-100 d-flex justify-content-between align-items-center"
                        href="/pekerjaan_desa/peternakan">Lihat Detail <i class="fas fa-angle-right"></i></a>
                </div> --}}
            </div>
        </div>
        <div class="col-xl col-md">
            <div class="card mb-4" style="border-left: 10px solid #007bff;">
                {{-- <div class="card-header"></div> --}}
                <div class="card-body">Meubel
                    <h3>{{ $meubels->count() }}</h3>
                </div>
                {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white w-100 d-flex justify-content-between align-items-center"
                        href="/pekerjaan_desa/peternakan">Lihat Detail <i class="fas fa-angle-right"></i></a>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md col-xl">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-chart-simple me-1"></i> Grafik Data Desa</div>
                <div id="chart"></div>
            </div>
        </div>

        <div class="col-md col-xl-5">
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
        </div>

    </div>
@endsection

@section('script')
    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                },
            },
            series: [{
                name: 'Jumlah Data',
                data: [
                    {{ $pertanians->count() }},
                    {{ $peternakans->count() }},
                    {{ $perkebunans->count() }},
                    {{ $perikanans->count() }},
                    {{ $meubels->count() }}
                ],
                color: '#3B5998'
            }],
            xaxis: {
                categories: ['Pertanian', 'Peternakan', 'Perkebunan', 'Perikanan', 'Meubel'],
                labels: {
                    style: {
                        colors: ['#7c97bb', '#7c97bb', '#7c97bb', '#7c97bb', '#7c97bb'],
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah Data',
                    style: {
                        color: '#7c97bb'
                    },

                }
            },
            colors: ['#3B5998'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }]
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
