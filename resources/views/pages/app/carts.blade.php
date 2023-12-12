@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Carts</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Carts</li>
      </ol>
    </nav>
  </header>
  <div class="container mt-4 responsive-content">
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
          <div class="mt-3 d-flex justify-content-between align-items-center">
            <a href="#" onclick="getModal()" class="text-white text-decoration-none d-inline-block rounded-3"
              style="padding: 10px 10px; background-color: rgba( 255, 255, 255, 0.2 );">
              <span class="d-flex justify-content-center align-items-center ">
                <iconify-icon icon="material-symbols:shopping-cart-checkout" class="me-2" width="25px"></iconify-icon>
                Checkout
              </span>
            </a>
            {{-- data-bs-toggle="modal" data-bs-target="#checkout" --}}
            <div>
              <span class="fs-4">Total : Rp.</span><span class="fs-4 fw-bold" id="total">
                {{ number_format($total, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div id="getModal">
      {{-- Modal content --}}
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
      function getModal() {
        $.get("{{ url('carts/modal') }}", {}, function(data, status) {
          $("#getModal").html(data);
          $('#checkout').modal('show');
        })
      }

      function selectOrderType() {
        const choose = document.getElementById('order-type');
        const showInput = document.querySelectorAll('.order-type');
        const showInputOnSite = document.querySelectorAll('.order-type-on-site');

        if (choose.value === 'Online') {
          showInput.forEach(element => {
            element.removeAttribute('hidden');
          });
        } else {
          showInput.forEach(element => {
            element.setAttribute('hidden', true);
          });
        }
        if (choose.value === 'On-Site') {
          showInputOnSite.forEach(element => {
            element.removeAttribute('hidden');
          });
        } else {
          showInputOnSite.forEach(element => {
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

        // Update the displayed quantity
        quantityElement.textContent = currentQuantity;

        // Update the corresponding input field value in the modal
        var inputMenuId = document.getElementById('inp_menu_id');
        var inputQuantity = document.getElementById('inp_quantity');

        if (inputMenuId && inputQuantity) {
          inputMenuId.value = itemId;
          inputQuantity.value = currentQuantity;
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
            // Update any other elements or totals as needed
            updateTotal(response.total);
          },
          error: function(error) {
            console.log('Error:', error);
          }
        });
      }

      // function updateQuantity(itemId, operation) {
      //   var quantityElement = document.getElementById('qty_' + itemId);
      //   var currentQuantity = parseInt(quantityElement.textContent);

      //   if (operation === 'increment') {
      //     currentQuantity++;
      //   } else if (operation === 'decrement' && currentQuantity > 1) {
      //     currentQuantity--;
      //   }
      //   var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
      //   $.ajax({
      //     type: 'POST',
      //     url: '/update-quantity/' + itemId,
      //     data: {
      //       quantity: currentQuantity
      //     },
      //     headers: {
      //       'X-CSRF-TOKEN': csrfToken
      //     },
      //     success: function(response) {
      //       quantityElement.textContent = currentQuantity;
      //       updateTotal(response.total);
      //     },
      //     error: function(error) {
      //       console.log('Error:', error);
      //     }
      //   });
      // }

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
