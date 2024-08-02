@extends('patrial.template')
@section('content')
<div class="container-fluid">
  <!--  Row 1 -->

  <div class="row">
    <div class="col-7">
      <canvas id="barChart"></canvas>
    </div>
    <div class="col-5">
      <div class="row mb-5">
        <div class="col-12">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $countPeminjamanSiswa }}</h3>
              <p>Peminjaman Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $countPeminjamanKaryawan }}</h3>
              <p>Peminjaman Karyawan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/sk4.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-5"> Mouse Logitech</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-2 mb-0">Logitech MX Master 3S <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-5">Boat Headphone</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-2 mb-0"> Baseus D02 Pro Foldable <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/sk3.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-5">Keyboard Keychron</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-2 mb-0">Keychron Q1 Pro Wireless <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-5">MacBook Air Pro</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-2 mb-0">Apple MacBook Pro 14 Inch M2 Max <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="py-6 px-6 text-center"> -->
    <!-- <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p> -->
    <!-- </div> -->
  </div>

  <style>
    body {
      font-family: sans-serif;
      margin: 0;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 20px 0;
      background-color: #F0F8FF;
    }

    /* Footer section styles */
    .footer-section {
      flex-basis: 70%;
      padding: 0 60px;
      text-align: center;
      /* Tambahkan properti text-align */
    }

    .footer-section h2 {
      margin-bottom: 10px;
      font-size: 18px;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
    }

    .footer-section li {
      margin-bottom: 5px;
    }

    .footer-section a {
      text-decoration: none;
      color: #333;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
      .footer-container {
        flex-direction: column;
        align-items: center;
      }

      .footer-section {
        flex-basis: 100%;
        margin-bottom: 20px;
      }
    }

    .bg-info,
    .bg-info>a {
      background-color: #17a2b8 !important;
      color: #fff !important;
    }

    .small-box {
      border-radius: .25rem;
      box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
      display: block;
      margin-bottom: 20px;
      position: relative;
    }

    .small-box>.inner {
      padding: 10px;
    }

    .small-box p {
      font-size: 1rem;
    }

    .small-box h3 {
      font-size: 2.2rem;
      font-weight: 700;
      margin: 0 0 10px;
      padding: 0;
      white-space: nowrap;
    }
  </style>
@if(!empty($jsonBarang['labels']))
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  
  <script>
    $(document).ready(function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($jsonBarang['labels']),
                    datasets: [{
                        label: 'Stock Quantity',
                        data: @json($jsonBarang['data']),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    });
</script>
@endif
  @endsection