@extends('layouts.app')
@section('title', 'Table Number')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Table Number</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Table Number</li>
      </ol>
    </nav>
  </header>

  <div class="container my-3 responsive-content">
    @role('kasir')
      <button class="text-white border-0  text-decoration-none d-inline-block rounded-3"
        style="padding: 10px 20px; background-color: rgba( 255, 255, 255, 0.2 );  backdrop-filter: blur( 10px );"
        data-bs-toggle="modal" data-bs-target="#createTableModal">
        <span class="d-flex justify-content-center align-items-center ">
          <iconify-icon icon="icon-park-outline:plus" width="25px"></iconify-icon> &nbsp;&nbsp; Create Table
        </span>
      </button>
    @endrole
  </div>

  <div class="container my-3 responsive-content">
    <div class="row" id="dataTableNumber">
      <!-- Data will be dynamically inserted here -->

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="createTableModal" tabindex="-1" aria-labelledby="createTableModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-white">
          <h1 class="modal-title fs-5 text-white" id="createTableModalLabel">Table Number</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('app.table_number.store') }}" method="POST" id="form">
          <div class="modal-body">
            @csrf
            <div class="form-floating mb-3 order-type">
              <input type="number" name="number" class="form-control" id="number" placeholder="00">
              <label for="number">Number</label>
              @error('number')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="border-0  rounded-3 text-white d-flex justify-content-center align-items-center"
              style="padding: 10px 30px;background: rgba( 255, 255, 255, 0.2 );
          backdrop-filter: blur( 15.5px );
          -webkit-backdrop-filter: blur( 15.5px );">
              Add
              Table</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function getData() {
      $.get("{{ url('app/table-number/read') }}", {}, function(data, status) {
        $('#dataTableNumber').html(data);
      });
    }

    $(document).ready(function() {
      getData();

      $('#form').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
          type: 'POST',
          url: '{{ route('app.table_number.store') }}',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            $('#createTableModal').modal('hide');
            getData();
            $('#form')[0].reset(); // Assuming your form has the ID 'form'
          },
          error: function(xhr, status, error) {
            console.error("Error:", error);
            console.error("Response:", xhr.responseText);
          }
        });
      });
    });
  </script>


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
