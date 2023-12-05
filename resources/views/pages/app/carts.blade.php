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
        <div class="bg-glass text-white p-4">
          <div class="table-responsive">
            <table class="table align-middle text-center ">
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
                      <button type="button" class="bg-light border-0 text-dark px-2 rounded-2 fw-bold" id="minus"
                        onclick="updateQuantity('{{ $item->id }}', 'decrement')">-</button>
                      <span class="mx-2" id="qty_{{ $item->id }}">{{ $item->quantity }}</span>
                      <button type="button" class="bg-light border-0 text-dark px-2 rounded-2 fw-medium" id="plus"
                        onclick="updateQuantity('{{ $item->id }}', 'increment')">+</button>
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
          {{-- {{ isset($item->id) ? route('app.menu.edit', $item->id) : '#' }} --}}
          <div class="mt-3 d-flex justify-content-between align-items-center">
            <a href="#" data-bs-toggle="modal" data-bs-target="#checkout"
              class="text-white text-decoration-none d-inline-block rounded-3"
              style="padding: 10px 10px; background-color: rgba( 255, 255, 255, 0.2 );">
              <span class="d-flex justify-content-center align-items-center ">
                <iconify-icon icon="material-symbols:shopping-cart-checkout" class="me-2" width="25px"></iconify-icon>
                Checkout
              </span>
            </a>
            <div>
              <span class="fs-4">Total : Rp.</span><span class="fs-4 fw-bold" id="total">
                {{ number_format($total, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-white">
            <h1 class="modal-title fs-5 text-white" id="checkoutModalLabel">Checkout</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('order.store') }}" method="POST">
            <div class="modal-body">
              @csrf
              @foreach ($data as $menu)
                <input type="hidden" name="menu_id[]" value="{{ $menu->menu->id }}">
                <input type="hidden" name="quantity[]" value="{{ $menu->quantity }}">
              @endforeach
              <div class="form-floating mb-3">
                <select class="form-select" name="order_type" id="order-type" aria-label="Default select example"
                  onchange="selectOrderType()">
                  <option selected disabled>Choose</option>
                  <option value="Online">Online</option>
                  <option value="On-Site">On-Site</option>
                </select>
                <label for="order-type">Order Type</label>
                @error('order_type')
                  <small class="text-white">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-floating mb-3 order-type" hidden>
                <input type="number" name="phone_number" class="form-control" id="phone-number" placeholder="0.000">
                <label for="phone-number">Phone Number</label>
                @error('phone_number')
                  <small class="text-white">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-floating mb-3 order-type" hidden>
                <input type="text" name="address" class="form-control" id="address" placeholder="Phone Number">
                <label for="address">Address</label>
                @error('address')
                  <small class="text-white">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" name="payment_method" id="payment-method"
                  aria-label="Default select example">
                  <option selected disabled>Choose</option>
                  <option value="Bank Transfer" disabled>Bank Transfer</option>
                  <option value="Cash">Cash</option>
                </select>
                <label for="payment-method">Payment Method</label>
                @error('payment_method')
                  <small class="text-white">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit"
                class="border-0  rounded-3 text-white d-flex justify-content-center align-items-center"
                style="padding: 10px 30px;background: rgba( 255, 255, 255, 0.2 );
            backdrop-filter: blur( 15.5px );
            -webkit-backdrop-filter: blur( 15.5px );"><iconify-icon
                  icon="bi:bag-check" width="20px"></iconify-icon>&nbsp;&nbsp; Create
                Order</button>
            </div>
          </form>
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

    <script>
      function selectOrderType() {
        const choose = document.getElementById('order-type');
        const showInput = document.querySelectorAll('.order-type');

        if (choose.value === 'Online') {
          showInput.forEach(element => {
            element.removeAttribute('hidden');
          });
        } else {
          showInput.forEach(element => {
            element.setAttribute('hidden', true);
          });
        }
      }




      function updateQuantity(itemId, operation) {
        var quantityElement = document.getElementById('qty_' + itemId);
        var currentQuantity = parseInt(quantityElement.textContent);

        if (operation === 'increment') {
          currentQuantity++;
        } else if (operation === 'decrement' && currentQuantity > 1) {
          currentQuantity--;
        }
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        $.ajax({
          type: 'POST',
          url: '/update-quantity/' + itemId,
          data: {
            quantity: currentQuantity
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {
            quantityElement.textContent = currentQuantity;
            updateTotal(response.total);
          },
          error: function(error) {
            console.log('Error:', error);
          }
        });
      }

      function formatRupiah(angka) {
        var numberString = angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        return ' ' + numberString;
      }

      function updateTotal(newTotal) {
        var totalElement = document.getElementById('total');
        totalElement.textContent = formatRupiah(newTotal);
      }
    </script>
  @endsection
