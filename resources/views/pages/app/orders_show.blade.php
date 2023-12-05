@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container px-5 mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Orders</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Orders</li>
      </ol>
    </nav>
  </header>

  @role('kasir')
    <div class="container px-5 mt-4">
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="bg-glass text-center text-white p-4">
            <div class="table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Orderer</th>
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
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $item->user->name }}</td>
                      <td>{{ $item->created_at->format('d F Y, H:i:s') }}</td>
                      {{-- <td>Rp. {{ number_format($item->menu->price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td> --}}
                      <td><span
                          class="badge {{ $item->status == 'Pending' ? 'text-bg-warning' : '' }}">{{ $item->status }}</span>
                      </td>
                      <td>
                        <a href="{{ route('app.orders.show', ['user_id' => $item->user_id, 'id' => $item->id]) }}"
                          class="text-white text-decoration-none d-inline-block rounded-3"
                          style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                          <span class="d-flex justify-content-center align-items-center ">
                            <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                          </span>
                        </a>
                        <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                          style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                          <span class="d-flex justify-content-center align-items-center ">
                            <iconify-icon icon="mingcute:check-line" width="25px"></iconify-icon>
                          </span>
                        </a>
                        <a href="" class="text-white text-decoration-none d-inline-block rounded-3"
                          style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                          <span class="d-flex justify-content-center align-items-center ">
                            <iconify-icon icon="uil:times" width="25px"></iconify-icon>
                          </span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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
                  <table class="table text-start">
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
                  </table>
                </div>
              </div>

              <div>
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
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endrole

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
  </style>
@endsection
