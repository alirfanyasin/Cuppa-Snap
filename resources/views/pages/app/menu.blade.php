@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <div class="container px-5" style="margin-top: 150px">
    <div class="row">
      <div class="col-md-4" style="margin-bottom: 150px;">
        <div class="bg-glass text-center text-white py-4 px-3 position-relative">
          <div class="position-absolute" style="top: -80px;">
            <img src="{{ asset('assets/img/img-1.png') }}" alt="" width="70%">
          </div>
          <div class="text-white" style="margin-top: 100px">
            <h4>Caramel Macchiato</h4>
            <p class="fw-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fs-5">Rp. 35.000</span>
              <span>245 Terjual</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );">
                <span class="d-flex justify-content-center align-items-center ">
                  <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                  cart
                </span>
              </a>
              <div>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="margin-bottom: 150px;">
        <div class="bg-glass text-center text-white py-4 px-3 position-relative">
          <div class="position-absolute" style="top: -80px;">
            <img src="{{ asset('assets/img/img-2.png') }}" alt="" width="70%">
          </div>
          <div class="text-white" style="margin-top: 100px">
            <h4>Caramel Macchiato</h4>
            <p class="fw-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fs-5">Rp. 35.000</span>
              <span>245 Terjual</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );">
                <span class="d-flex justify-content-center align-items-center ">
                  <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                  cart
                </span>
              </a>
              <div>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="margin-bottom: 150px;">
        <div class="bg-glass text-center text-white py-4 px-3 position-relative">
          <div class="position-absolute" style="top: -80px;">
            <img src="{{ asset('assets/img/img-3.png') }}" alt="" width="70%">
          </div>
          <div class="text-white" style="margin-top: 100px">
            <h4>Caramel Macchiato</h4>
            <p class="fw-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fs-5">Rp. 35.000</span>
              <span>245 Terjual</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );">
                <span class="d-flex justify-content-center align-items-center ">
                  <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                  cart
                </span>
              </a>
              <div>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="margin-bottom: 150px;">
        <div class="bg-glass text-center text-white py-4 px-3 position-relative">
          <div class="position-absolute" style="top: -80px;">
            <img src="{{ asset('assets/img/img-4.png') }}" alt="" width="70%">
          </div>
          <div class="text-white" style="margin-top: 100px">
            <h4>Caramel Macchiato</h4>
            <p class="fw-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fs-5">Rp. 35.000</span>
              <span>245 Terjual</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );">
                <span class="d-flex justify-content-center align-items-center ">
                  <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                  cart
                </span>
              </a>
              <div>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="margin-bottom: 150px;">
        <div class="bg-glass text-center text-white py-4 px-3 position-relative">
          <div class="position-absolute" style="top: -80px;">
            <img src="{{ asset('assets/img/img-6.png') }}" alt="" width="70%">
          </div>
          <div class="text-white" style="margin-top: 100px">
            <h4>Caramel Macchiato</h4>
            <p class="fw-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fs-5">Rp. 35.000</span>
              <span>245 Terjual</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );">
                <span class="d-flex justify-content-center align-items-center ">
                  <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                  cart
                </span>
              </a>
              <div>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-bold" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
                <iconify-icon icon="solar:star-line-duotone" width="20px"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="position-absolute" style="bottom: 0; right: 0;">
            <iconify-icon icon="game-icons:coffee-beans" width="90px"
              style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
