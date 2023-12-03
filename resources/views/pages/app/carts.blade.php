@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container px-5 mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Carts</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Carts</li>
      </ol>
    </nav>
  </header>
  <div class="container px-5 mt-4">
    <div class="row">
      <div class="col mb-5">
        <div class="bg-glass text-center text-white p-4">
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
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
                  <td>
                    <span class="bg-light text-dark px-2 rounded-2 fw-bold" id="minus">-</span>
                    <span class="mx-2" id="qty">{{ $item->quantity }}</span>
                    <span class="bg-light text-dark px-2 rounded-2 fw-medium" id="plus">+</span>
                  </td>
                  <td>
                    <form action="{{ route('carts.destroy', $item->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button class="bg-transparent text-white border-0"><iconify-icon icon="humbleicons:times"
                          width="20px"></iconify-icon></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <style>
      .table {
        --bs-table-bg: none;
        --bs-table-color: white;
      }

      #minus:hover,
      #plus:hover {
        cursor: pointer;
      }
    </style>
  @endsection
