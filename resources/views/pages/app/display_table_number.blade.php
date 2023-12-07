@foreach ($data as $item)
  <div class="col-md-3 mb-3">
    <div class="bg-glass text-white p-4">
      <div class="d-flex justify-content-between align-items-center position-relative">
        <iconify-icon icon="material-symbols:table-restaurant-outline" width="100px"></iconify-icon>
        <div class="">
          <div class="fw-bold" style="font-size: 30pt; margin-bottom: -10px">{{ $item->number }}</div>
          @if ($item->status == 'Empty')
            <div class="bg-danger rounded-pill mx-auto" style="width: 20px; height: 20px;"></div>
          @else
            <div class="bg-success rounded-pill mx-auto" style="width: 20px; height: 20px;"></div>
          @endif
        </div>
      </div>
      <div class="position-absolute" style="right: 4px;">
        <button type="button" class="bg-transparent border-0 text-white" data-bs-toggle="modal"
          data-bs-target="#editTableModal-{{ $item->id }}">
          <iconify-icon icon="uil:edit" width="20px"></iconify-icon>
        </button>
        <form action="{{ route('app.table_number.destroy', $item->id) }}" method="POST" class="d-inline"
          id="btnDelete">
          @csrf
          <button type="submit" class="bg-transparent border-0 ext-decoration-none text-white d-inline-block">
            <iconify-icon icon="fluent:delete-12-regular" width="20px"></iconify-icon>
          </button>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="editTableModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editTableModal"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-white">
          <h1 class="modal-title fs-5 text-white" id="editTableModalLabel">Table Number</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('app.table_number.update', $item->id) }}" method="POST" id="formEdit">
          <div class="modal-body">
            @csrf
            <div class="form-floating mb-3 order-type">
              <input type="number" name="number" class="form-control" id="number" placeholder="00"
                value="{{ $item->number }}">
              <label for="number">Number</label>
              @error('number')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" name="status" id="status" aria-label="Default select example">
                <option value="Empty" {{ $item->status == 'Empty' ? 'selected' : '' }}>Empty</option>
                <option value="Full" {{ $item->status == 'Full' ? 'selected' : '' }}>Full</option>
              </select>
              <label for="status">Status</label>
              @error('status')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit"
              class="border-0  rounded-3 text-white d-flex justify-content-center align-items-center"
              style="padding: 10px 30px;background: rgba( 255, 255, 255, 0.2 );
          backdrop-filter: blur( 15.5px );
          -webkit-backdrop-filter: blur( 15.5px );">
              Update
              Table</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $('#formEdit').on('submit', function(e) {
      e.preventDefault();

      var data = new FormData(this);

      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
          getData();
          $('#editTableModal-{{ $item->id }}').modal('hide');
          $('#formEdit')[0].reset();
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });

    $('#btnDelete').on('submit', function(event) {
      event.preventDefault()

      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        dataType: 'json',
        success: function(response) {
          getData()
        },
        error: function(xhr, status, error) {
          console.log(error)
        }
      })
    })
  </script>
@endforeach
