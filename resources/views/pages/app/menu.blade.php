@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Menu</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
      </ol>
    </nav>
  </header>
  <div class="container my-3 responsive-content">
    @role('kasir')
      <a href="{{ route('app.menu.create') }}" class="text-white text-decoration-none d-inline-block rounded-3"
        style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );  backdrop-filter: blur( 10px );">
        <span class="d-flex justify-content-center align-items-center ">
          <iconify-icon icon="icon-park-outline:plus" width="25px"></iconify-icon> &nbsp;&nbsp; Create Menu
        </span>
      </a>
    @endrole
  </div>
  <div class="container responsive-content" style="margin-top: 150px">
    <div class="row">
      @foreach ($data as $item)
        <div class="col-xl-4 col-lg-6 col-12" style="margin-bottom: 150px;">
          <div class="bg-glass text-center text-white py-4 px-3 position-relative">
            <div class="position-absolute" id="position-img-menu">
              <img src="{{ asset('storage/menu/' . $item->image) }}" alt="photo" class="mx-auto" width="65%">
            </div>
            <div class="text-white" style="margin-top: 90px; margin-bottom: 100px">
              <h4>{{ $item->name }}</h4>
              <p class="fw-light">{{ $item->description }}</p>

              <div class="position-absolute w-100 px-3" style="bottom: 15px; left: 0; right: 0;">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fs-5">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                  <span>{{ $totalSold[$item->id] ?? 0 }} Sold</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                  @role('pelanggan')
                    <form action="{{ route('add_to_card', $item->id) }}" method="POST" class="d-inline">
                      @csrf
                      <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="menu_id" id="menu_id" value="{{ $item->id }}">
                      <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                        style="padding: 10px 10px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                          class="d-flex justify-content-center align-items-center ">
                          <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                          cart
                        </span></button>
                    </form>
                  @endrole
                  @role('kasir')
                    <div>
                      <a href="{{ route('app.menu.edit', $item->id) }}"
                        class="text-white text-decoration-none d-inline-block rounded-3"
                        style="padding: 10px 10px; background-color: rgba( 255, 255, 255, 0.2 );">
                        <span class="d-flex justify-content-center align-items-center ">
                          <iconify-icon icon="uil:edit" width="25px"></iconify-icon>
                        </span>
                      </a>
                      <form action="{{ route('app.menu.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                          style="padding: 10px 10px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                            class="d-flex justify-content-center align-items-center ">
                            <iconify-icon icon="fluent:delete-12-regular" width="25px"></iconify-icon>
                          </span></button>
                      </form>
                    </div>
                  @endrole

                  <div>
                    @if (isset($averageRatings[$item->id]))
                      @php
                        $roundedRating = round($averageRatings[$item->id]);
                      @endphp

                      @for ($i = 1; $i <= 5; $i++)
                        <iconify-icon icon="{{ $i <= $roundedRating ? 'solar:star-bold' : 'solar:star-line-duotone' }}"
                          width="20px" class="text-warning"></iconify-icon>
                      @endfor
                    @else
                      @for ($i = 1; $i <= 5; $i++)
                        <iconify-icon icon="solar:star-line-duotone" width="20px" class="text-warning"></iconify-icon>
                      @endfor
                    @endif
                  </div>
                  {{-- <div>
                    <iconify-icon icon="solar:star-bold" width="20px" class="text-warning"></iconify-icon>
                    <iconify-icon icon="solar:star-bold" width="20px" class="text-warning"></iconify-icon>
                    <iconify-icon icon="solar:star-bold" width="20px" class="text-warning"></iconify-icon>
                    <iconify-icon icon="solar:star-line-duotone" width="20px" class="text-warning"></iconify-icon>
                    <iconify-icon icon="solar:star-line-duotone" width="20px" class="text-warning"></iconify-icon>
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="position-absolute" style="bottom: 0; right: 0;">
              <iconify-icon icon="game-icons:coffee-beans" width="90px"
                style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
