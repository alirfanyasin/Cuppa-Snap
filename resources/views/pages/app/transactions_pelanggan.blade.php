@extends('layouts.app')
@section('title', 'Transactions')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Transaction</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Transactions</li>
      </ol>
    </nav>
  </header>

  <div class="container mt-4 responsive-content">
    <div class="row">
      <div class="col">
        <div class="bg-glass text-center text-white p-4 overflow-auto" style="height: 550px">
          <div class="table-responsive">
            <table class="table  align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Code</th>
                  <th scope="col">Payment Method</th>
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
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $item->code }}</td>
                      <td>{{ $item->payment_method }}</td>
                      <td>{{ $item->created_at->diffForHumans() }}</td>
                      <td><span
                          class="badge {{ $item->status == 'Done' ? 'text-bg-success' : '' }}{{ $item->status == 'Canceled' ? 'text-bg-danger' : '' }}{{ $item->status == 'Rejected' ? 'text-bg-danger' : '' }}">{{ $item->status }}</span>
                      <td>
                        <a href="{{ route('transactions.show', ['code' => $item->code, 'id' => $item->id]) }}"
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
    </div>
  </div>


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
