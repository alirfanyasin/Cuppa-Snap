@extends('layouts.app')
@section('title', 'Rating')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Rating</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Rating</li>
      </ol>
    </nav>
  </header>
  @role('pelanggan')
    <div class="container mt-4 responsive-content">
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="bg-glass text-white p-4">
            <header>
              <h5>Detail</h5>
            </header>

            <div class="mt-3">
              <div>
                @php
                  $totalPrice = 0;
                @endphp
                @foreach ($menu as $data_order)
                  <div class="d-flex align-items-center mb-3">
                    <div class="d-flex justify-content-center align-items-center rounded-4 p-2"
                      style="width: 80px; height: 80px;  background: rgba( 255, 255, 255, 0.2 );">
                      <img src="{{ asset('storage/menu/' . $data_order->menu->image) }}" alt="" width="100%">
                    </div>
                    <div class="ms-3">
                      <div class="fw-semibold fs-6">{{ $data_order->menu->name }}</div>
                      <div>Rp. {{ number_format($data_order->menu->price, 0, ',', '.') }}</div>
                      <div>Qty : {{ $data_order->quantity }}</div>
                    </div>
                  </div>

                  @php
                    $subtotal = $data_order->menu->price * $data_order->quantity;
                    $totalPrice += $subtotal;
                  @endphp
                @endforeach
              </div>

              <hr class="border-2">
              <div class="d-flex justify-content-between">
                <div>Total : </div>
                <h5>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</h5>
              </div>

              <div class="mt-3">
                <form action="{{ route('rating.post') }}" id="ratingForm" method="POST">
                  @csrf
                  @foreach ($menu as $item)
                    <input type="hidden" name="user_id[]" value="{{ $item->user->id }}">
                    <input type="hidden" name="menu_id[]" value="{{ $item->menu->id }}">
                    <input type="hidden" name="code[]" value="{{ $item->code }}">
                  @endforeach

                  <div class="d-flex justify-content-evenly">
                    @for ($i = 1; $i <= 5; $i++)
                      <span class="star" data-value="{{ $i }}"><iconify-icon icon="solar:star-line-duotone"
                          width="40px" class="text-warning"></iconify-icon></span>
                    @endfor
                  </div>
                  <input type="hidden" name="ratings" id="selectedRating" value="">

                  <button type="submit"
                    class="border-0 rounded-3 w-100 mt-2 text-white d-flex justify-content-center align-items-center"
                    style="padding: 10px 30px;background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15.5px);-webkit-backdrop-filter: blur(15.5px);">
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endrole

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const stars = document.querySelectorAll('.star');
      const selectedRating = document.getElementById('selectedRating');

      stars.forEach(star => {
        star.addEventListener('click', function() {
          const ratingValue = this.getAttribute('data-value');
          resetStars(stars);
          highlightStars(stars, ratingValue);
          selectedRating.value = ratingValue;
        });
      });

      function resetStars(stars) {
        stars.forEach(star => {
          // Clear existing content
          while (star.firstChild) {
            star.removeChild(star.firstChild);
          }

          // Add default star icon
          const icon = document.createElement('iconify-icon');
          icon.setAttribute('icon', 'solar:star-line-duotone');
          icon.setAttribute('width', '40px');
          icon.classList.add('text-warning');
          star.appendChild(icon);
        });
      }

      function highlightStars(stars, value) {
        for (let i = 0; i < value; i++) {
          // Clear existing content
          while (stars[i].firstChild) {
            stars[i].removeChild(stars[i].firstChild);
          }

          // Add bold star icon
          const icon = document.createElement('iconify-icon');
          icon.setAttribute('icon', 'solar:star-bold');
          icon.setAttribute('width', '40px');
          icon.classList.add('text-warning');
          stars[i].appendChild(icon);
        }
      }
    });
  </script>
  <style>
    .table {
      --bs-table-bg: none;
      --bs-table-color: white;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      color: #471804;
    }

    .nav-tabs .nav-link {
      color: white;
    }

    .table td,
    .table th {
      white-space: nowrap;
    }

    #table-custom td,
    #table-custom th {
      white-space: normal;
    }
  </style>
@endsection
