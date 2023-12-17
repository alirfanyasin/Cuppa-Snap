@extends('layouts.app')
@section('title', 'Show Orders')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Orders</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Show Orders</li>
      </ol>
    </nav>
  </header>

  @role('pelanggan')
    <div class="container mt-4 responsive-content">
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="bg-glass text-center text-white p-4">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders"
                  type="button" role="tab" aria-controls="nav-orders" aria-selected="true">Orders</button>
                <button class="nav-link" id="nav-done-tab" data-bs-toggle="tab" data-bs-target="#nav-done" type="button"
                  role="tab" aria-controls="nav-done" aria-selected="false">Done</button>
                <button class="nav-link" id="nav-canceled-tab" data-bs-toggle="tab" data-bs-target="#nav-canceled"
                  type="button" role="tab" aria-controls="nav-canceled" aria-selected="false">Canceled</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-orders" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="table-responsive">
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data as $item)
                        @if ($item->user_id == Auth::user()->id)
                          @if ($item->status == 'Pending' || $item->status == 'Process')
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $item->code }}</td>
                              <td>{{ $item->created_at->format('d F Y, H:i:s') }}</td>
                              <td><span
                                  class="badge {{ $item->status == 'Pending' ? 'text-bg-warning' : '' }} {{ $item->status == 'Process' ? 'text-bg-primary' : '' }}">{{ $item->status }}</span>
                              </td>
                              <td>
                                <a href="{{ route('orders.show', ['code' => $item->code, 'id' => $item->id]) }}"
                                  class="text-white text-decoration-none d-inline-block rounded-3"
                                  style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                  <span class="d-flex justify-content-center align-items-center ">
                                    <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                                  </span>
                                </a>
                                @if ($item->status != 'Pending')
                                  <form action="{{ route('orders.confirmed', $item->code) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                                      style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                                        class="d-flex justify-content-center align-items-center ">
                                        <iconify-icon icon="mingcute:check-line" width="25px"></iconify-icon>
                                      </span></button>
                                  </form>
                                @endif
                                @if ($item->status != 'Process')
                                  <form action="{{ route('orders.canceled', $item->code) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                                      style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                                        class="d-flex justify-content-center align-items-center ">
                                        <iconify-icon icon="uil:times" width="25px"></iconify-icon>
                                      </span></button>
                                  </form>
                                @endif
                              </td>
                            </tr>
                          @endif
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-done" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="table-responsive">
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data as $item)
                        @if ($item->user_id == Auth::user()->id)
                          @if ($item->status == 'Done')
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $item->code }}</td>
                              <td>{{ $item->created_at->format('d F Y, H:i:s') }}</td>
                              <td><span
                                  class="badge {{ $item->status == 'Done' ? 'text-bg-success' : '' }}">{{ $item->status }}</span>
                              </td>
                              <td>
                                <a href="{{ route('orders.show', ['code' => $item->code, 'id' => $item->id]) }}"
                                  class="text-white text-decoration-none d-inline-block rounded-3"
                                  style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                  <span class="d-flex justify-content-center align-items-center ">
                                    <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                                  </span>
                                </a>
                                <button type="button" class="text-white border-0 d-inline-block rounded-3"
                                  style="padding: 6px 6px; background-color: rgba(255, 255, 255, 0.2);"
                                  data-bs-toggle="modal" data-bs-target="#ratingsModal{{ $item->code }}"
                                  data-code="{{ $item->code }}">
                                  <span class="d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="ph:star" width="25px"></iconify-icon>
                                  </span>
                                </button>
                                <form action="{{ route('orders.destroy', $item->code) }}" method="POST"
                                  class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                                    style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                                      class="d-flex justify-content-center align-items-center ">
                                      <iconify-icon icon="fluent:delete-12-regular" width="25px"></iconify-icon>
                                    </span></button>
                                </form>
                              </td>
                            </tr>
                          @endif
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-canceled" role="tabpanel" aria-labelledby="nav-contact-tab"
                tabindex="0">
                <div class="table-responsive">
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data as $item)
                        @if ($item->user_id == Auth::user()->id)
                          @if ($item->status == 'Rejected' || $item->status == 'Canceled')
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $item->code }}</td>
                              <td>{{ $item->created_at->format('d F Y, H:i:s') }}</td>
                              <td><span
                                  class="badge {{ $item->status == 'Rejected' ? 'text-bg-danger' : '' }} {{ $item->status == 'Canceled' ? 'text-bg-danger' : '' }}">{{ $item->status }}</span>
                              </td>
                              <td>
                                <a href="{{ route('orders.show', ['code' => $item->code, 'id' => $item->id]) }}"
                                  class="text-white text-decoration-none d-inline-block rounded-3"
                                  style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                  <span class="d-flex justify-content-center align-items-center ">
                                    <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                                  </span>
                                </a>
                                <form action="{{ route('orders.destroy', $item->code) }}" method="POST"
                                  class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                                    style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                                      class="d-flex justify-content-center align-items-center ">
                                      <iconify-icon icon="fluent:delete-12-regular" width="25px"></iconify-icon>
                                    </span></button>
                                </form>
                              </td>
                            </tr>
                          @endif
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="bg-glass text-white p-4 overflow-auto" style="height: 500px">
            <header>
              <h5>Detail</h5>
            </header>
            <div class="mt-3">
              <div class="overflow-hidden rounded-pill mx-auto mb-3" style="width: 100px; height: 100px;">
                <img src="{{ asset('assets/img/photo-profile.jpg') }}" alt="" width="100%">
              </div>
              <div class="text-center">
                <h5>{{ $dataBuyer->user->name }}</h5>
                <div>{{ $dataBuyer->user->email }}</div>
                <div class="table-responsive mt-4">
                  <table class="table text-start" id="table-custom">
                    <tr>
                      <td>Order Type</td>
                      <td>:</td>
                      <td>{{ $dataBuyer->order_type }}</td>
                    </tr>
                    <tr>
                      <td>Payment Method</td>
                      <td>:</td>
                      <td>{{ $dataBuyer->payment_method }}</td>
                    </tr>
                    <tr>
                      <td>Phone Number</td>
                      <td>:</td>
                      <td>{{ $dataBuyer->phone_number }}</td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>:</td>
                      <td>{{ $dataBuyer->address }}</td>
                    </tr>
                    <tr>
                      <td>Table Number</td>
                      <td>:</td>
                      <td>{{ $dataBuyer->table_id }}</td>
                    </tr>
                    <tr>
                      <td>Payment Status</td>
                      <td>:</td>
                      <td>
                        @if ($dataBuyer->status == 'Process' || $dataBuyer->status == 'Done')
                          <span class="badge text-bg-success">Success</span>
                        @else
                          <span class="badge text-bg-info">Waiting</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td><span
                          class="badge {{ $dataBuyer->status == 'Pending' ? 'text-bg-warning' : '' }} {{ $dataBuyer->status == 'Process' ? 'text-bg-primary' : '' }}{{ $dataBuyer->status == 'Rejected' ? 'text-bg-danger' : '' }}{{ $dataBuyer->status == 'Canceled' ? 'text-bg-primary' : '' }} {{ $dataBuyer->status == 'Done' ? 'text-bg-success' : '' }}">{{ $dataBuyer->status }}</span>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>

              <div>
                @php
                  $totalPrice = 0;
                @endphp
                @foreach ($order as $data_order)
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
              <hr class="border-2">

              @if ($dataBuyer->status == 'Pending' && $dataBuyer->payment_method == 'Transfer')
                <button type="button" id="pay-button" class="border-0 text-white w-100 d-block rounded-3"
                  style="padding: 10px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                  <span class="d-flex justify-content-center align-items-center ">
                    <iconify-icon icon="tdesign:money" width="25px"></iconify-icon> &nbsp;&nbsp;
                    Pay Now
                  </span>
                </button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @endrole

  <!-- Ratings Modals -->
  @foreach ($data as $item)
    @if ($item->user_id == Auth::user()->id && $item->status == 'Done')
      <div class="modal fade" id="ratingsModal{{ $item->code }}" tabindex="-1" aria-labelledby="ratingsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-white" id="ratingsModalLabel">Ratings</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="ratingForm" method="POST">
              <div class="modal-body">
                <input type="hidden" name="rating" id="selectedRating" value="">
                <div class="d-flex justify-content-around">
                  @for ($i = 1; $i <= 5; $i++)
                    <span class="star" data-value="{{ $i }}"><iconify-icon icon="solar:star-line-duotone"
                        width="40px" class="text-warning"></iconify-icon></span>
                  @endfor
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit"
                  class="border-0 rounded-3 text-white d-flex justify-content-center align-items-center"
                  style="padding: 10px 30px;background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15.5px);-webkit-backdrop-filter: blur(15.5px);">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endif
  @endforeach



  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const stars = document.querySelectorAll('.star');
      const selectedRating = document.getElementById('selectedRating');

      stars.forEach(star => {
        star.addEventListener('click', function() {
          const ratingValue = this.getAttribute('data-value');
          resetStars();
          highlightStars(ratingValue);
          selectedRating.value = ratingValue;
        });
      });

      function resetStars() {
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

      function highlightStars(value) {
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

    .modal-content {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(15.5px);
      -webkit-backdrop-filter: blur(15.5px);
      border-radius: 15px;
      border: 2px solid rgba(255, 255, 255, 0.50);
    }
  </style>

  @php
    $newToken = $snapToken;
  @endphp
@endsection



@push('script-body')
  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    $(document).ready(function() {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      console.log("CSRF Token:", csrfToken);

      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function() {

        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.pay('{{ $dataBuyer->snapToken }}', {
          onSuccess: function(result) {
            console.log("Payment success!");
            console.log(result);
            updateStatus();
          },
          onPending: function(result) {
            console.log("Waiting for payment!");
            console.log(result);
          },
          onError: function(result) {
            console.log("Payment failed!");
            console.log(result);
          },
          onClose: function() {
            console.log('Popup closed without finishing payment');
          }
        });
      });


      function updateStatus() {
        $.ajax({
          type: 'POST',
          url: "{{ url('orders/update/status/' . $dataBuyer->code) }}",
          data: {
            status: 'Process',
            _token: csrfToken,
          },
          success: function(response) {
            // console.log(response.message);
            window.location.href = '/orders';
          },
          error: function(error) {
            console.log('Error:', error);
          }
        });
      }
    })
  </script>
@endpush
