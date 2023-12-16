@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Dashboard</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </header>
  <div class="container mt-4 responsive-content">
    <div class="row mb-1">
      <div class="col-md-4 mb-3">
        <div class="bg-glass text-center text-white py-4 position-relative">
          <h1 class="fw-bold" style="font-size: 60pt;">18</h1>
          <h5>Total Purchases</h5>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="bg-glass text-center text-white py-4 position-relative">
          <h1 class="fw-bold" style="font-size: 60pt;">0</h1>
          <h5>Total Cart</h5>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="bg-glass text-center text-white py-4 position-relative">
          <h1 class="fw-bold" style="font-size: 60pt;">345</h1>
          <h5>Total Sales</h5>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-1">
      <div class="col-md-8 mb-3">
        <div class="bg-glass text-start text-white p-3">
          <h5>Statistic</h5>

          <div>
            {!! $chart->container() !!}
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="bg-glass text-start text-white p-3" style="height: 350px; overflow-y: auto;">
          <h5 class="mb-4">Top Product</h5>
          <div class="d-flex align-items-center mb-3">
            <div class="d-flex justify-content-center align-items-center rounded-4"
              style="width: 80px; height: 80px;  background: rgba( 255, 255, 255, 0.2 );">
              <img src="{{ asset('assets/img/img-1.png') }}" alt="" width="100%">
            </div>
            <div class="ms-3">
              <div class="fw-semibold fs-6">Arabicano</div>
              <div>Rp. 35.000</div>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="d-flex justify-content-center align-items-center rounded-4"
              style="width: 80px; height: 80px;  background: rgba( 255, 255, 255, 0.2 );">
              <img src="{{ asset('assets/img/img-3.png') }}" alt="" width="100%">
            </div>
            <div class="ms-3">
              <div class="fw-semibold fs-6">Arabicano</div>
              <div>Rp. 35.000</div>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="d-flex justify-content-center align-items-center rounded-4"
              style="width: 80px; height: 80px;  background: rgba( 255, 255, 255, 0.2 );">
              <img src="{{ asset('assets/img/img-2.png') }}" alt="" width="100%">
            </div>
            <div class="ms-3">
              <div class="fw-semibold fs-6">Arabicano</div>
              <div>Rp. 35.000</div>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="d-flex justify-content-center align-items-center rounded-4"
              style="width: 80px; height: 80px;  background: rgba( 255, 255, 255, 0.2 );">
              <img src="{{ asset('assets/img/img-1.png') }}" alt="" width="100%">
            </div>
            <div class="ms-3">
              <div class="fw-semibold fs-6">Arabicano</div>
              <div>Rp. 35.000</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ $chart->cdn() }}"></script>

  {{ $chart->script() }}
@endsection
