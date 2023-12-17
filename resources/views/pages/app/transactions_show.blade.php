@extends('layouts.app')
@section('title', 'Show Orders')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Transaction</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Show Transaction</li>
      </ol>
    </nav>
  </header>

  @role('kasir')
    <div class="container mt-4 responsive-content">
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="bg-glass text-center text-white p-4">
            <div class="table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
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
                    @if ($item->status == 'Done' || $item->status == 'Canceled' || $item->status == 'Rejected')
                      <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->created_at->format('d F Y, H:i:s') }}</td>
                        <td><span
                            class="badge {{ $item->status == 'Done' ? 'text-bg-success' : '' }} {{ $item->status == 'Rejected' ? 'text-bg-danger' : '' }}{{ $item->status == 'Canceled' ? 'text-bg-danger' : '' }}">{{ $item->status }}</span>
                        </td>
                        <td>
                          <a href="{{ route('app.transactions.show', ['code' => $item->code, 'id' => $item->id]) }}"
                            class="text-white text-decoration-none d-inline-block rounded-3"
                            style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                            <span class="d-flex justify-content-center align-items-center ">
                              <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                            </span>
                          </a>
                        </td>
                      </tr>
                    @endif
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
                          class="badge {{ $dataBuyer->status == 'Done' ? 'text-bg-success' : '' }} {{ $dataBuyer->status == 'Rejected' ? 'text-bg-danger' : '' }}{{ $dataBuyer->status == 'Canceled' ? 'text-bg-danger' : '' }}">{{ $dataBuyer->status }}</span>
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

    #table-custom td,
    #table-custom th {
      white-space: normal;
    }
  </style>
@endsection
