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
  <div class="container px-5 mt-4">
    <div class="row">
      <div class="col">
        <div class="bg-glass text-center text-white p-4">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders"
                type="button" role="tab" aria-controls="nav-orders" aria-selected="true">Orders</button>
              <button class="nav-link" id="nav-done-tab" data-bs-toggle="tab" data-bs-target="#nav-done" type="button"
                role="tab" aria-controls="nav-done" aria-selected="false">Done</button>
              <button class="nav-link" id="nav-canceled-tab" data-bs-toggle="tab" data-bs-target="#nav-canceled"
                type="button" role="tab" aria-controls="nav-canceled" aria-selected="false">Canceled</button>
              <button class="nav-link" id="nav-rating-tab" data-bs-toggle="tab" data-bs-target="#nav-rating"
                type="button" role="tab" aria-controls="nav-rating" aria-selected="false">Rating</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-orders" role="tabpanel" aria-labelledby="nav-home-tab"
              tabindex="0">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
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
                      <td><img src="{{ asset('storage/menu/' . $item->menu->image) }}" alt="" width="70px"></td>
                      <td>{{ $item->menu->name }}</td>
                      <td>Rp. {{ number_format($item->menu->price, 0, ',', '.') }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td><span
                          class="badge {{ $item->status == 'Pending' ? 'text-bg-warning' : '' }}">{{ $item->status }}</span>
                      </td>
                      <td>@mdo</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-done" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
              ...</div>
            <div class="tab-pane fade" id="nav-canceled" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
              ...</div>
            <div class="tab-pane fade" id="nav-rating" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
              ...</div>
          </div>

        </div>
      </div>
    </div>

    <style>
      .table {
        --bs-table-bg: none;
        --bs-table-color: white;
      }
    </style>
  @endsection
