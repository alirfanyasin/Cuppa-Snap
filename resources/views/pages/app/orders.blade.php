@extends('layouts.app')
@section('title', 'Orders')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Orders</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Orders</li>
      </ol>
    </nav>
  </header>

  @role('pelanggan')
    <div class="container mt-4 responsive-content">
      <div class="row">
        <div class="col">
          <div class="bg-glass text-center text-white p-4 overflow-auto" style="height: 550px">
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
                          @if ($item->status == 'Pending' || $item->status == 'Process')
                            <div class="d-none">
                            </div>
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $item->code }}</td>
                              <td>{{ $item->payment_method }}</td>
                              <td>{{ $item->created_at->diffForHumans() }}</td>
                              <td><span
                                  class="badge {{ $item->status == 'Pending' ? 'text-bg-warning' : '' }}{{ $item->status == 'Process' ? 'text-bg-primary' : '' }}">{{ $item->status }}</span>
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

                                @if (!$isRating->contains($item->code))
                                  <a href="{{ route('rating', ['code' => $item->code]) }}"
                                    class="text-white text-decoration-none d-inline-block rounded-3"
                                    style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                    <span class="d-flex justify-content-center align-items-center ">
                                      <iconify-icon icon="ph:star" width="25px"></iconify-icon>
                                    </span>
                                  </a>
                                @endif


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
                  <table class="table  align-middle">
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
                              <td>{{ $item->created_at->diffForHumans() }}</td>
                              <td><span
                                  class="badge {{ $item->status == 'Rejected' ? 'text-bg-danger' : '' }}{{ $item->status == 'Canceled' ? 'text-bg-danger' : '' }}">{{ $item->status }}</span>
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
      </div>
    </div>
  @endrole



  @role('kasir')
    <div class="container mt-4 responsive-content">
      <div class="row">
        <div class="col mb-5">
          <div class="bg-glass text-center text-white p-4 overflow-auto" style="height: 550px">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders"
                  type="button" role="tab" aria-controls="nav-orders" aria-selected="true">Orders</button>
                <button class="nav-link" id="nav-done-tab" data-bs-toggle="tab" data-bs-target="#nav-done"
                  type="button" role="tab" aria-controls="nav-done" aria-selected="false">Done</button>
                <button class="nav-link" id="nav-canceled-tab" data-bs-toggle="tab" data-bs-target="#nav-canceled"
                  type="button" role="tab" aria-controls="nav-canceled" aria-selected="false">Canceled</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-orders" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="table-responsive">
                  <table class="table  align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
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
                        @if ($item->status == 'Pending' || $item->status == 'Process')
                          <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>
                              {{ $item->created_at->diffForHumans() }}
                            </td>
                            <td><span
                                class="badge {{ $item->status == 'Pending' ? 'text-bg-warning' : '' }} {{ $item->status == 'Process' ? 'text-bg-primary' : '' }}">{{ $item->status }}</span>
                            </td>
                            <td>
                              <a href="{{ route('app.orders.show', ['code' => $item->code, 'id' => $item->id]) }}"
                                class="text-white text-decoration-none d-inline-block rounded-3"
                                style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                <span class="d-flex justify-content-center align-items-center ">
                                  <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                                </span>
                              </a>
                              <form action="{{ route('app.orders.confirmed', $item->code) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                                  style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                                    class="d-flex justify-content-center align-items-center ">
                                    <iconify-icon icon="mingcute:check-line" width="25px"></iconify-icon>
                                  </span></button>
                              </form>
                              <form action="{{ route('app.orders.rejected', $item->code) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                                  style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );"><span
                                    class="d-flex justify-content-center align-items-center ">
                                    <iconify-icon icon="uil:times" width="25px"></iconify-icon>
                                  </span></button>
                              </form>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-done" role="tabpanel" aria-labelledby="nav-profile-tab"
                tabindex="0">
                <div class="table-responsive">
                  <table class="table  align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
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
                        @if ($item->status == 'Done')
                          <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>
                              {{ $item->created_at->diffForHumans() }}
                            </td>
                            <td><span
                                class="badge {{ $item->status == 'Done' ? 'text-bg-success' : '' }}">{{ $item->status }}</span>
                            </td>
                            <td>
                              <a href="{{ route('app.orders.show', ['code' => $item->code, 'id' => $item->id]) }}"
                                class="text-white text-decoration-none d-inline-block rounded-3"
                                style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                <span class="d-flex justify-content-center align-items-center ">
                                  <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                                </span>
                              </a>
                              <form action="{{ route('app.orders.destroy', $item->code) }}" method="POST"
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
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-canceled" role="tabpanel" aria-labelledby="nav-contact-tab"
                tabindex="0">
                <div class="table-responsive">
                  <table class="table  align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
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
                        @if ($item->status == 'Rejected' || $item->status == 'Canceled')
                          <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>
                              {{ $item->created_at->diffForHumans() }}
                            </td>
                            <td><span
                                class="badge {{ $item->status == 'Rejected' ? 'text-bg-danger' : '' }} {{ $item->status == 'Canceled' ? 'text-bg-danger' : '' }}">{{ $item->status }}</span>
                            </td>
                            <td>
                              <a href="{{ route('app.orders.show', ['code' => $item->code, 'id' => $item->id]) }}"
                                class="text-white text-decoration-none d-inline-block rounded-3"
                                style="padding: 6px 6px; background-color: rgba( 255, 255, 255, 0.2 );">
                                <span class="d-flex justify-content-center align-items-center ">
                                  <iconify-icon icon="ph:eye" width="25px"></iconify-icon>
                                </span>
                              </a>
                              <form action="{{ route('app.orders.destroy', $item->code) }}" method="POST"
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
                      @endforeach
                    </tbody>
                  </table>
                </div>
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

    .modal-content {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(15.5px);
      -webkit-backdrop-filter: blur(15.5px);
      border-radius: 15px;
      border: 2px solid rgba(255, 255, 255, 0.50);
    }
  </style>
@endsection

@push('script-head')
@endpush
