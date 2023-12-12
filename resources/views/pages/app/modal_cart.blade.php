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
            <input type="hidden" name="menu_id[]" id="inp_menu_id" value="{{ $menu->menu->id }}">
            <input type="hidden" name="quantity[]" id="inp_quantity" value="{{ $menu->quantity }}">
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
          <div class="form-floating mb-3 order-type-on-site" hidden>
            <select class="form-select" name="table_number" id="table-number" aria-label="Default select example">
              @foreach ($dataTable as $table)
                <option value="{{ $table->number }}">{{ $table->number }}</option>
              @endforeach
              <option value="">No Select</option>
            </select>
            <label for="table-number">Table Number</label>
            @error('table_number')
              <small class="text-white">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" name="payment_method" id="payment-method" aria-label="Default select example">
              <option selected disabled>Choose</option>
              <option value="Transfer">Transfer</option>
              <option value="Cash">Cash</option>
            </select>
            <label for="payment-method">Payment Method</label>
            @error('payment_method')
              <small class="text-white">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="pay-button"
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
